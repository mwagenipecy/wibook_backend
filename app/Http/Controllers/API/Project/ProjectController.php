<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectTransactionResource;
use App\Models\ProjectHasUser;
use App\Models\ProjectTransaction;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Services\ProjectUserService;
use Illuminate\Support\Facades\DB;

class ProjectController extends BaseController
{

    protected $projectUserService;

    public function __construct(ProjectUserService $projectUserService)
    {
        $this->projectUserService = $projectUserService;
    }


    // Get project list for a particular user
    public function projectList()
    {
        try {
            // Ensure the user exists and get the authenticated user ID
            $userId =  auth()->user()->id ;

        
            $projects = Project::whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);  // Modify this based on your pivot structure
            })->paginate(10);  // Pagination for better performance with large data

            if ($projects->isEmpty()) {
                return $this->sendError('No projects found for this user', 'No projects available', 404);
            }

            return $this->sendResponse(ProjectResource::collection($projects), 'Successfully fetched projects', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Failed to fetch projects or user not found'.$e->getMessage(), 500);
        }
    }


    // Create a new project
    public function createProject(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        try {

            

            DB::beginTransaction();
            $userId =  auth()->user()->id;
            $validated['user_id']=$userId;
            $validated['status']='active';
            $project = Project::create($validated);
            $result = $this->projectUserService->assignUserToProject($userId, $project->id);
            if (!$result['status']) {
                DB::rollBack();
                return $this->sendError($result['message'], 'User assignment failed', 500);
            }

            DB::commit();

            return $this->sendResponse(new ProjectResource($project), "Successfully created", 201);
        } catch (\Exception $e) {
            // Rollback in case of any failure
            DB::rollBack();
            return $this->sendError($e->getMessage(), $e->getMessage(), 500);
        }
    }


    // Update an existing project
    public function updateProject(Request $request, $id)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        try {
            // Ensure the project exists
            $project = Project::findOrFail($id);

            // Check if the user is authorized to update this project
            if (Auth::id() != $project->user_id) {
                return $this->sendError('', 'Unauthorized', 500);
            }

            // Update the project
            $project->update($validated);

            return $this->sendResponse($project, 'successfully updated ', 201);
        } catch (ValidationException $e) {
            return $this->sendError($e->errors(), 'Validation failed', 422);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Failed to update project', 500);
        }
    }



    public function detachUserFromProject(Request $request, $projectId)
    {
        try {
            // Ensure the user exists and get the authenticated user ID
            $userId = $request->userId;
            $project = Project::findOrFail($projectId);

            // Check if the user is assigned to the project
            if (!$project->users->contains($userId)) {
                return $this->sendError('User is not assigned to this project', 'User not found in project', 404);
            }

            // Detach the user from the project
            $project->users()->detach($userId);

            return $this->sendResponse([], 'User successfully detached from the project', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Failed to detach user from project', 500);
        }
    }


    public function viewProject(Request $request){

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id', 
        ]);


        if (! $validated) {
            return $this->sendError('something went wrong', 'something is wrong', 404);
        }


        // $request->project_id=1;

        $project = Project::findOrFail($request->project_id);

        

         $projectTransaction =ProjectTransaction::where("project_id",$request->project_id)->get();

         $userIds=  ProjectHasUser::where("project_id", $request->project_id)->pluck("user_id")->toArray();  
         $projectUser= User::whereIn('id',$userIds)->get();
       

         $data=[

             "projectData"=> new ProjectResource( $project),
            "transactionHistory"=> ProjectTransactionResource::collection(($projectTransaction)),
            "projectUsers"=> UserResource::collection($projectUser),


         ];

        //  return $data;


         return $this->sendResponse(  $data, "Successfully created", 201);

    }



    public function attachUserToProject(Request $request, $projectId)
    {
        try {
            // Validate the request data
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id', 
            ]);

            // Retrieve the authenticated user
            $authUserId = auth()->user()->id;

            $project = Project::findOrFail($projectId);

            $userId = $validated['user_id'];

            if ($project->users->contains($userId)) {
                return $this->sendError('User is already assigned to this project', 'User already attached', 400);
            }

            // Attach the user to the project
            $project->users()->attach($userId);

            return $this->sendResponse([], 'User successfully attached to the project', 200);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Failed to attach user to project', 500);
        }
    }



    public function listProjectUsers($projectId)
{

    try {
        // Find the project by ID
        $project = Project::findOrFail($projectId);

        // Retrieve the users associated with the project
        $users = $project->users;

        // Return the list of users
        return $this->sendResponse(UserResource::collection($users), 'Users successfully fetched', 200);
    } catch (\Exception $e) {
        return $this->sendError($e->getMessage(), 'Failed to fetch users for project', 500);
    }

    
}


}
