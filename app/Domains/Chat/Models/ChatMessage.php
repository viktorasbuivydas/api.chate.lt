<?php

namespace App\Domains\Chat\Models;

use App\Domains\Authorization\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'chat_id'
    ];

    public $cast = [
        'created_at' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
