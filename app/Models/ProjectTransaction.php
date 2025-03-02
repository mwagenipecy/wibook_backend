<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTransaction extends Model
{


    // Define fillable attributes for mass assignment
    protected $fillable = [
        'description',
        'amount',
        'type',
        'user_id',
        'project_id',
        'date'
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that this transaction is associated with.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
