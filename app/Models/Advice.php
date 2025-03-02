<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
        'description',
        'image_url',
        'status',
    ];
}
