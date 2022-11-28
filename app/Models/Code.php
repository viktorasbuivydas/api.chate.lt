<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'code',
        'email',
    ];
}
