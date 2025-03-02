<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];

   // In Project.php model
public function users()
{
    return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
}


}
