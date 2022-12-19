<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThreadQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'thread_id',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(QuestionComment::class, 'question_id', 'id');
    }

    public function thread()
    {
        return $this->hasOne(Thread::class, 'id', 'thread_id');
    }
}
