<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'icon',
        'position',
    ];

    public function children()
    {
        return $this->hasMany(Thread::class, 'parent_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(ThreadQuestion::class, 'question_id', 'thread_id');
    }
}
