<?php

namespace App\Http\Middleware;

use App\Exceptions\MustWaitSecondsException;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class Antispam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $antispam = User::where('id', auth()->id())->first()->antispam;
        if ($antispam->isPast()) {
            return $next($request);
        }

        throw new MustWaitSecondsException(
            Carbon::now()->diffInSeconds($antispam)
        );
    }
}
