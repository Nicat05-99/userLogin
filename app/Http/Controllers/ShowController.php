<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class ShowController extends Controller
{
    public function show($userId)
    {
        // Redis'ten kullanıcı verilerini al
        $userData = Redis::hgetall('user');

        // Blade şablonuna verileri aktar
        return view('index', ['userData' => $userData]);
    }


}
