<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\ChatRoomMessageObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
