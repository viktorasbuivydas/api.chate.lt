<?php

namespace App\Http\Middleware;

use App\Models\Online;
use Closure;
use Illuminate\Http\Request;

class UpdateUserOnline
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = auth('sanctum')->user();

        if (! $user) {
            return $next($request);
        }

        $agent = new \Jenssegers\Agent\Agent;
        $device = $agent->isMobile();

        $online = Online::firstOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'user_id' => $user->id,
                'is_mobile' => $device,
            ]
        );

        $online->touch();

        return $next($request);
    }
}
