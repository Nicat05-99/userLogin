<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function registerIndex()
    {
        return view('back.register.registerUser');
    }

    public function userCreate( RegisterRequest $request)
    {


       User::create($request->only(['name', 'email', 'password']));
       Session::flash('success', 'Kayıt başarıyla tamamlandı.');
        return redirect()->route('register-index');
    }
}
