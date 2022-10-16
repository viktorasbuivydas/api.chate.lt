<?php

namespace App\Domains\Online\Models;

use App\Domains\Authorization\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;

    public $table = 'online';

    protected $fillable = [
        'user_id'
    ];

    public $casts = [
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
