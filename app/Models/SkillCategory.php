<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'items' => 'array',
    ];
}
