<?php

namespace App\Domains\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'question_id'
    ];
}
