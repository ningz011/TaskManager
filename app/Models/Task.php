<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title' ,
        'description' ,
        'is_completed' ,
        'due date' ,
    ];

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean' ,
            'due_date' => 'date'
        ];
    }
}
