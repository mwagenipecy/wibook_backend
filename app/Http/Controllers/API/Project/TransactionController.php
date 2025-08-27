<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectTransactionResource;
use App\Models\ProjectHasUser;
use App\Models\ProjectTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends BaseController
{


    public function transactionList()
    {
        try {
            \Log::info('transactionList called');
            
            $user = Auth::user();
            \Log::info('User authenticated:', ['user_id' => $user->id]);
            
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            \Log::info('User projects:', $userProjects);
            
            $transactions = ProjectTransaction::whereIn('project_id', $userProjects)
                ->with(['user', 'project'])
                ->latest()
                ->get();
            
            \Log::info('Transactions found:', ['count' => $transactions->count()]);
            
            if ($transactions->count() > 0) {
                \Log::info('First transaction sample:', [
                    'id' => $transactions->first()->id,
                    'project' => $transactions->first()->project ? $transactions->first()->project->toArray() : null,
                    'user' => $transactions->first()->user ? $transactions->first()->user->toArray() : null,
                ]);
            }

            return $this->sendResponse(
                ProjectTransactionResource::collection($transactions), 
                'Transactions successfully fetched', 
                200
            );
        } catch (\Exception $e) {
            \Log::error('Error in transactionList:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return $this->sendError($e->getMessage(), 'Failed to fetch transactions', 500);
        }
    }

    public function getTransactionReports(Request $request)
    {
        try {
            \Log::info('getTransactionReports called with request:', $request->all());
            
            $user = Auth::user();
            \Log::info('User authenticated:', ['user_id' => $user->id]);
            
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            \Log::info('User projects:', $userProjects);
            
            $query = ProjectTransaction::whereIn('project_id', $userProjects)
                ->with(['user', 'project']);
            
            // Filter by project if specified
            if ($request->has('project_id') && $request->project_id) {
                $query->where('project_id', $request->project_id);
                \Log::info('Filtering by project_id:', ['project_id' => $request->project_id]);
            }
            
            // Filter by year if specified
            if ($request->has('year') && $request->year) {
                $query->whereYear('date', $request->year);
                \Log::info('Filtering by year:', ['year' => $request->year]);
            }
            
            // Filter by date range if specified
            if ($request->has('start_date') && $request->start_date) {
                $query->where('date', '>=', $request->start_date);
                \Log::info('Filtering by start_date:', ['start_date' => $request->start_date]);
            }
            
            if ($request->has('end_date') && $request->end_date) {
                $query->where('date', '<=', $request->end_date . ' 23:59:59');
                \Log::info('Filtering by end_date:', ['end_date' => $request->end_date]);
            }
            
            // Filter by transaction type if specified
            if ($request->has('type') && $request->type) {
                $query->where('type', $request->type);
                \Log::info('Filtering by type:', ['type' => $request->type]);
            }
            
            \Log::info('Executing query...');
            $transactions = $query->latest()->get();
            \Log::info('Query executed, transactions count:', ['count' => $transactions->count()]);
            
            // Calculate summary statistics
            $totalIncome = $transactions->where('type', 'income')->sum('amount');
            $totalExpenses = $transactions->where('type', 'expenditure')->sum('amount');
            $netAmount = $totalIncome - $totalExpenses;
            
            $reportData = [
                'transactions' => ProjectTransactionResource::collection($transactions),
                'summary' => [
                    'total_transactions' => $transactions->count(),
                    'total_income' => $totalIncome,
                    'total_expenses' => $totalExpenses,
                    'net_amount' => $netAmount,
                    'income_count' => $transactions->where('type', 'income')->count(),
                    'expense_count' => $transactions->where('type', 'expenditure')->count(),
                ],
                'filters_applied' => [
                    'project_id' => $request->project_id,
                    'year' => $request->year,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'type' => $request->type,
                ]
            ];
            
            \Log::info('Report data prepared successfully');
            return $this->sendResponse($reportData, 'Transaction report generated successfully', 200);
        } catch (\Exception $e) {
            \Log::error('Error in getTransactionReports:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return $this->sendError($e->getMessage(), 'Failed to generate transaction report', 500);
        }
    }

    public function getProjectDataForAI($projectId)
    {
        try {
            \Log::info('getProjectDataForAI called for project:', ['project_id' => $projectId]);
            
            $user = Auth::user();
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            
            // Check if user has access to this project
            if (!in_array($projectId, $userProjects)) {
                return $this->sendError('Access denied', 'You do not have access to this project', 403);
            }
            
            // Get project details
            $project = \App\Models\Project::find($projectId);
            if (!$project) {
                return $this->sendError('Project not found', 'The specified project does not exist', 404);
            }
            
            // Get project transactions
            $transactions = ProjectTransaction::where('project_id', $projectId)
                ->with(['user', 'project'])
                ->latest()
                ->get();
            
            // Calculate financial metrics
            $totalIncome = $transactions->where('type', 'income')->sum('amount');
            $totalExpenses = $transactions->where('type', 'expenditure')->sum('amount');
            $netAmount = $totalIncome - $totalExpenses;
            $profitMargin = $totalIncome > 0 ? (($netAmount / $totalIncome) * 100) : 0;
            
            // Monthly breakdown for trends
            $monthlyData = $transactions->groupBy(function($transaction) {
                return \Carbon\Carbon::parse($transaction->date)->format('Y-m');
            })->map(function($monthTransactions) {
                return [
                    'income' => $monthTransactions->where('type', 'income')->sum('amount'),
                    'expenses' => $monthTransactions->where('type', 'expenditure')->sum('amount'),
                    'net' => $monthTransactions->where('type', 'income')->sum('amount') - $monthTransactions->where('type', 'expenditure')->sum('amount'),
                    'count' => $monthTransactions->count(),
                ];
            });
            
            // Top expense categories (if we had categories)
            $expenseTransactions = $transactions->where('type', 'expenditure');
            $topExpenses = $expenseTransactions->take(5)->map(function($transaction) {
                return [
                    'description' => $transaction->description,
                    'amount' => $transaction->amount,
                    'date' => $transaction->date,
                ];
            });
            
            // Income sources
            $incomeTransactions = $transactions->where('type', 'income');
            $incomeSources = $incomeTransactions->take(5)->map(function($transaction) {
                return [
                    'description' => $transaction->description,
                    'amount' => $transaction->amount,
                    'date' => $transaction->date,
                ];
            });
            
            $aiData = [
                'project' => [
                    'id' => $project->id,
                    'name' => $project->name,
                    'description' => $project->description,
                    'location' => $project->location,
                    'status' => $project->status,
                    'created_at' => $project->created_at,
                ],
                'financial_summary' => [
                    'total_transactions' => $transactions->count(),
                    'total_income' => $totalIncome,
                    'total_expenses' => $totalExpenses,
                    'net_amount' => $netAmount,
                    'profit_margin_percentage' => round($profitMargin, 2),
                    'income_count' => $incomeTransactions->count(),
                    'expense_count' => $expenseTransactions->count(),
                ],
                'monthly_trends' => $monthlyData,
                'top_expenses' => $topExpenses,
                'income_sources' => $incomeSources,
                'recent_transactions' => ProjectTransactionResource::collection($transactions->take(10)),
                'analysis_period' => [
                    'start_date' => $transactions->min('date'),
                    'end_date' => $transactions->max('date'),
                    'days_analyzed' => $transactions->isNotEmpty() ? \Carbon\Carbon::parse($transactions->min('date'))->diffInDays(\Carbon\Carbon::parse($transactions->max('date'))) + 1 : 0,
                ]
            ];
            
            \Log::info('AI data prepared successfully for project:', ['project_id' => $projectId]);
            return $this->sendResponse($aiData, 'Project data for AI consultation prepared successfully', 200);
            
        } catch (\Exception $e) {
            \Log::error('Error in getProjectDataForAI:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return $this->sendError($e->getMessage(), 'Failed to prepare project data for AI', 500);
        }
    }

    public function getTransactionSummary(Request $request)
    {
        try {
            $user = Auth::user();
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            
            $query = ProjectTransaction::whereIn('project_id', $userProjects);
            
            // Filter by project if specified
            if ($request->has('project_id') && $request->project_id) {
                $query->where('project_id', $request->project_id);
            }
            
            // Filter by year if specified
            if ($request->has('year') && $request->year) {
                $query->whereYear('date', $request->year);
            }
            
            // Filter by date range if specified
            if ($request->has('start_date') && $request->start_date) {
                $query->where('date', '>=', $request->start_date);
            }
            
            if ($request->has('end_date') && $request->end_date) {
                $query->where('date', '<=', $request->end_date . ' 23:59:59');
            }
            
            $transactions = $query->get();
            
            // Monthly breakdown
            $monthlyData = $transactions->groupBy(function($transaction) {
                return \Carbon\Carbon::parse($transaction->date)->format('Y-m');
            })->map(function($monthTransactions) {
                return [
                    'income' => $monthTransactions->where('type', 'income')->sum('amount'),
                    'expenses' => $monthTransactions->where('type', 'expenditure')->sum('amount'),
                    'count' => $monthTransactions->count(),
                ];
            });
            
            // Project breakdown
            $projectData = $transactions->groupBy('project_id')->map(function($projectTransactions) {
                return [
                    'income' => $projectTransactions->where('type', 'income')->sum('amount'),
                    'expenses' => $projectTransactions->where('type', 'expenditure')->sum('amount'),
                    'count' => $projectTransactions->count(),
                ];
            });
            
            $summary = [
                'total_transactions' => $transactions->count(),
                'total_income' => $transactions->where('type', 'income')->sum('amount'),
                'total_expenses' => $transactions->where('type', 'expenditure')->sum('amount'),
                'net_amount' => $transactions->where('type', 'income')->sum('amount') - $transactions->where('type', 'expenditure')->sum('amount'),
                'monthly_breakdown' => $monthlyData,
                'project_breakdown' => $projectData,
            ];
            
            return $this->sendResponse($summary, 'Transaction summary generated successfully', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Failed to generate transaction summary', 500);
        }
    }


    public function store(Request $request)
    {

        try {

            $validated = $request->validate([
                'description' => 'nullable|string',
                'amount' => 'required|numeric',
                'type' => 'required|in:income,expenditure',
                'project_id' => 'required|exists:projects,id',
                'date' => 'nullable|date',
            ]);

            $validated ['user_id'] = auth()->user()->id;
            $transaction = ProjectTransaction::create($validated);

            return $this->sendResponse(
                ProjectTransactionResource::collection([$transaction]),
                'successfully created',
                201
            );

            
        } catch (\Exception $e) {

            return $this->sendError(
                $e->getMessage(),
                'something went wrong'.$e->getMessage(),
                500
            );
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $transaction = ProjectTransaction::findOrFail($id);

            $validated = $request->validate([
                'description' => 'nullable|string',
                'amount' => 'required|numeric',
                'type' => 'required|in:income,expenditure',
                'user_id' => 'nullable|exists:users,id',
                'project_id' => 'required|exists:projects,id',
                'date' => 'nullable|date',
            ]);

            $transaction->update($validated);

            return $this->sendResponse(new ProjectTransactionResource($transaction), 'Successfully updated', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Something went wrong', 500);
        }
    }

    public function destroy($id)
    {
        try {
            $transaction = ProjectTransaction::findOrFail($id);
            $transaction->delete();

            return $this->sendResponse(null, 'Successfully deleted', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Something went wrong', 500);
        }
    }
}
