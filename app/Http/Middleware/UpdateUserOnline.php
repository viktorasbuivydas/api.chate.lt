<?php

namespace App\Http\Middleware;

use App\Domains\Online\Models\Online;
use Closure;
use Illuminate\Http\Request;

class UpdateUserOnline
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return $next($request);
        }

        $online = Online::firstOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'user_id' => $user->id
            ]
        );

        $online->touch();

        return $next($request);
    }
}
