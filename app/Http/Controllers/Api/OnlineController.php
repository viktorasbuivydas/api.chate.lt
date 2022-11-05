<?php

namespace App\Http\Controllers\Api;

use App\Domains\Online\Resources\OnlineResource;
use App\Domains\Online\Models\Online;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OnlineController extends Controller
{
    public function index()
    {
        return OnlineResource::collection(
            Online::with('user')
                ->where('updated_at', '>', Carbon::now()->subMinutes(10))
                ->get()
        );
    }
}
