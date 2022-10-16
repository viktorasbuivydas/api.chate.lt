<?php

namespace App\Domains\Chat\Models;

use App\Domains\Authorization\Models\User;
use App\Domains\Chat\Observers\ChatObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public static function boot()
    {
        parent::boot();

        static::observe(ChatObserver::class);
    }
}
