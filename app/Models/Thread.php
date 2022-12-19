<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'icon', 'is_locked'];

    public function children()
    {
        return $this->hasMany(Thread::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Thread::class, 'id', 'parent_id');
    }

    public function questions()
    {
        return $this->hasMany(ThreadQuestion::class, 'thread_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_locked', false);
    }

    public function scopeLocked($query)
    {
        return $query->where('is_locked', true);
    }

    public function scopeChild($query)
    {
        return $query->where('parent_id', null);
    }
}
