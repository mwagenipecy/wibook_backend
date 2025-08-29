<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectTransactionResource;
use App\Models\ProjectHasUser;
use App\Models\ProjectTransaction;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

    /**
     * Export transaction reports as PDF
     */
    public function exportTransactionReportPDF(Request $request)
    {
        try {
            $user = Auth::user();
            \Log::info('PDF Export requested', [
                'user_id' => $user->id,
                'filters' => $request->all()
            ]);

            // Get user's projects
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            
            if (empty($userProjects)) {
                return $this->sendError('No projects found', 'You must be part of at least one project to generate reports', 400);
            }

            // Build the query
            $query = ProjectTransaction::whereIn('project_id', $userProjects)
                ->with(['user', 'project', 'category']);

            // Apply filters
            if ($request->filled('project_id')) {
                $query->where('project_id', $request->project_id);
            }

            if ($request->filled('type') && $request->type !== 'all') {
                $query->where('type', $request->type);
            }

            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', $request->start_date);
            }

            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', $request->end_date);
            }

            if ($request->filled('year')) {
                $query->whereYear('created_at', $request->year);
            }

            // Get transactions
            $transactions = $query->orderBy('created_at', 'desc')->get();

            // Calculate summary
            $totalIncome = $transactions->where('type', 'income')->sum('amount');
            $totalExpense = $transactions->where('type', 'expense')->sum('amount');
            $netProfit = $totalIncome - $totalExpense;

            // Get project name if specific project is selected
            $projectName = null;
            if ($request->filled('project_id')) {
                $project = Project::find($request->project_id);
                $projectName = $project ? $project->name : null;
            }

            // Build period string
            $period = 'All Time';
            if ($request->filled('year')) {
                $period = 'Year ' . $request->year;
            } elseif ($request->filled('start_date') && $request->filled('end_date')) {
                $period = Carbon::parse($request->start_date)->format('M d, Y') . ' - ' . Carbon::parse($request->end_date)->format('M d, Y');
            } elseif ($request->filled('start_date')) {
                $period = 'From ' . Carbon::parse($request->start_date)->format('M d, Y');
            } elseif ($request->filled('end_date')) {
                $period = 'Until ' . Carbon::parse($request->end_date)->format('M d, Y');
            }

            // Generate monthly breakdown
            $monthlyBreakdown = [];
            if ($request->filled('year')) {
                for ($month = 1; $month <= 12; $month++) {
                    $monthTransactions = $transactions->filter(function ($transaction) use ($month, $request) {
                        return Carbon::parse($transaction->created_at)->month === $month && 
                               Carbon::parse($transaction->created_at)->year == $request->year;
                    });

                    $monthIncome = $monthTransactions->where('type', 'income')->sum('amount');
                    $monthExpense = $monthTransactions->where('type', 'expense')->sum('amount');

                    if ($monthIncome > 0 || $monthExpense > 0) {
                        $monthlyBreakdown[] = [
                            'month' => Carbon::create($request->year, $month, 1)->format('M Y'),
                            'income' => $monthIncome,
                            'expense' => $monthExpense,
                            'net' => $monthIncome - $monthExpense,
                        ];
                    }
                }
            }

            // Prepare data for PDF
            $reportData = [
                'user_name' => $user->name,
                'project_name' => $projectName,
                'generated_at' => Carbon::now()->format('M d, Y h:i A'),
                'period' => $period,
                'transaction_type' => $request->type ?? 'all',
                'transactions' => $transactions->toArray(),
                'summary' => [
                    'total_income' => $totalIncome,
                    'total_expense' => $totalExpense,
                    'net_profit' => $netProfit,
                ],
                'monthly_breakdown' => $monthlyBreakdown,
            ];

            \Log::info('PDF Data prepared', [
                'transaction_count' => count($reportData['transactions']),
                'total_income' => $totalIncome,
                'total_expense' => $totalExpense
            ]);

            // Generate PDF
            $pdf = PDF::loadView('pdf.transaction-report', compact('reportData'));
            
            // Set PDF options
            $pdf->setPaper('A4', 'portrait');
            $pdf->setOptions([
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isRemoteEnabled' => false,
                'isHtml5ParserEnabled' => true,
            ]);

            // Generate filename
            $filename = 'transaction-report-' . Carbon::now()->format('Y-m-d-H-i-s') . '.pdf';

            \Log::info('PDF generated successfully', ['filename' => $filename]);

            // Return PDF as download
            return $pdf->download($filename);

        } catch (\Exception $e) {
            \Log::error('Failed to export PDF report', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Failed to export PDF report', $e->getMessage(), 500);
        }
    }

    /**
     * Get PDF preview data (for frontend to show what will be in the PDF)
     */
    public function getTransactionReportPreview(Request $request)
    {
        try {
            $user = Auth::user();
            
            // Get user's projects
            $userProjects = $user->projects()->pluck('projects.id')->toArray();
            
            if (empty($userProjects)) {
                return $this->sendError('No projects found', 'You must be part of at least one project to generate reports', 400);
            }

            // Build the query (same as PDF export)
            $query = ProjectTransaction::whereIn('project_id', $userProjects)
                ->with(['user', 'project', 'category']);

            // Apply filters
            if ($request->filled('project_id')) {
                $query->where('project_id', $request->project_id);
            }

            if ($request->filled('type') && $request->type !== 'all') {
                $query->where('type', $request->type);
            }

            if ($request->filled('start_date')) {
                $query->whereDate('created_at', '>=', $request->start_date);
            }

            if ($request->filled('end_date')) {
                $query->whereDate('created_at', '<=', $request->end_date);
            }

            if ($request->filled('year')) {
                $query->whereYear('created_at', $request->year);
            }

            // Get transactions count and summary
            $transactions = $query->get();
            $totalIncome = $transactions->where('type', 'income')->sum('amount');
            $totalExpense = $transactions->where('type', 'expense')->sum('amount');
            $netProfit = $totalIncome - $totalExpense;

            $previewData = [
                'total_transactions' => $transactions->count(),
                'total_income' => $totalIncome,
                'total_expense' => $totalExpense,
                'net_profit' => $netProfit,
                'date_range' => [
                    'start' => $request->start_date,
                    'end' => $request->end_date,
                    'year' => $request->year,
                ],
                'filters' => [
                    'project_id' => $request->project_id,
                    'type' => $request->type ?? 'all',
                ]
            ];

            return $this->sendResponse($previewData, 'PDF preview data retrieved successfully');

        } catch (\Exception $e) {
            \Log::error('Failed to get PDF preview data', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return $this->sendError('Failed to get preview data', $e->getMessage(), 500);
        }
    }
}
