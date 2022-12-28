<?php

namespace App\Models;

use App\Observers\ThreadQuestionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public static function boot(): void
    {
        parent::boot();
        ThreadQuestion::observe(ThreadQuestionObserver::class);
    }
}
