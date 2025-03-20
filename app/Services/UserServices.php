<?php


namespace App\Services;

use App\Models\User;
use App\Models\ProjectHasUser;
class UserServices
{
    /**
     * Get the total number of users in a certain project.
     *
     * @param int $projectId
     * @return int
     */
    public function getTotalUsersInProject(int $projectId): int
    {
        return ProjectHasUser::where('project_id', $projectId)->count();
    }

    /**
     * Get the list of users in a certain project.
     *
     * @param int $projectId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersInProject(int $projectId)
    {
        return User::whereIn('id', ProjectHasUser::where('project_id', $projectId)
         ->pluck('user_id'))->get();
    }
}
