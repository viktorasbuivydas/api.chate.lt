<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\QuestionCommentObserver;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionComment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'question_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot(): void
    {
        parent::boot();
        QuestionComment::observe(QuestionCommentObserver::class);
    }
}
