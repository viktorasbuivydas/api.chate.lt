<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public function scopeApproved($query)
    {
        return $query->whereNot('approved_at', null);
    }

    public function scopeNotApproved($query)
    {
        return $query->whereNull('approved_at');
    }
}
