<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectHasUser extends Model
{
    protected $fillable = ['name', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }
    
}
