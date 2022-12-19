<?php

namespace App\Models;

use App\Observers\InboxObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inbox extends Model
{
    use HasFactory;

    protected $table = 'inbox';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'content',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public static function boot(): void
    {
        parent::boot();
        Inbox::observe(InboxObserver::class);
    }
}
