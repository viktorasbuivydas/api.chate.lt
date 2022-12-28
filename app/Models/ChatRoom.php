<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_public',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(ChatRoomMessage::class);
    }

    public static function boot(): void
    {
        parent::boot();
    }
}
