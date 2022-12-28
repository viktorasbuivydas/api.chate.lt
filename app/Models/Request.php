<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'content',
        'approved_at',
    ];
}
