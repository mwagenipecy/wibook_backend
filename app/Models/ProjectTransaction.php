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
        'category_id',
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

    /**
     * Get the category that this transaction belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
