<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $casts = [
        'chips' => 'array',
        'highlights' => 'array',
        'links' => 'array',
    ];
}
