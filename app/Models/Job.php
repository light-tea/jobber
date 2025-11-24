<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'salary',
        'type',
        'description',
        'requirements',
        'benefits',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
    ];

    protected $hidden = [
        'created_at'
    ];
}
