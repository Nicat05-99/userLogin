<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerIndex()
    {
        return view('back.register.registerUser');
    }

    public function userCreate( Request $request)
    {


       User::create($request->only(['name', 'email', 'password']));


    }
}
