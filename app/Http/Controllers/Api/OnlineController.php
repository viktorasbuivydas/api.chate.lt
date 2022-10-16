<?php

namespace App\Http\Controllers\Api;

use App\Domains\Online\Resources\OnlineResource;
use App\Domains\Online\Models\Online;
use App\Http\Controllers\Controller;

class OnlineController extends Controller
{
    public function index()
    {
        return OnlineResource::collection(
            Online::with('user')->get()
        );
    }
}
