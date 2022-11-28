<?php

namespace App\Models;

use App\Observers\ChatRoomMessageObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatRoomMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'chat_room_id',
    ];

    public $cast = [
        'created_at' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot(): void
    {
        parent::boot();
        ChatRoomMessage::observe(ChatRoomMessageObserver::class);
    }
}
