<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectUserService
{
    /**
     * Assign a user to a project
     *
     * @param int $userId
     * @param int $projectId
     * @return array
     */
    public function assignUserToProject(int $userId, int $projectId): array
    {
        try {
            $project = Project::findOrFail($projectId);
            $user = User::findOrFail($userId);

            // Check if user is already assigned
            $exists = $project->users()->where('user_id', $userId)->exists();
            if ($exists) {
                return ['status' => false, 'message' => 'User is already assigned to this project'];
            }

            // Assign user
            $project->users()->attach($userId);

            return ['status' => true, 'message' => 'User assigned successfully'];

        } catch (ModelNotFoundException $e) {
            return ['status' => false, 'message' => 'User or project not found'];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
        
    }

    
    public function unassignUserFromProject(int $userId, int $projectId): array
    {
        try {
            $project = Project::findOrFail($projectId);
            $user = User::findOrFail($userId);

            // Check if user is assigned
            $exists = $project->users()->where('user_id', $userId)->exists();
            if (!$exists) {
                return ['status' => false, 'message' => 'User is not assigned to this project'];
            }

            // Unassign user
            $project->users()->detach($userId);

            return ['status' => true, 'message' => 'User unassigned successfully'];

        } catch (ModelNotFoundException $e) {
            return ['status' => false, 'message' => 'User or project not found'];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }
}
