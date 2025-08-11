<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectTransactionResource;
use App\Models\ProjectHasUser;
use App\Models\ProjectTransaction;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{


    public function transactionList()
    {

        try {

           // where('id', auth()->user()->id)->

           $projectId=ProjectHasUser::where('user_id', auth()->user()->id)->pluck('project_id')->toArray();
            if ($projectId->isEmpty()) {
                return $this->sendError('No projects found for this user', 'No projects found', 404);
            }

            $transactions = ProjectTransaction::whereIn('project_id', $projectId)->latest()->get();
            return $this->sendResponse(
                ProjectTransactionResource::collection($transactions),
                'successfully ',
                201
            );
        } catch (\Exception $e) {

            return $this->sendError(
                $e->getMessage(),
                $e->getMessage(),
                500
            );
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
