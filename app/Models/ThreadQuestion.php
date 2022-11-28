<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThreadQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'thread_id',
        'question_id',
    ];
}
