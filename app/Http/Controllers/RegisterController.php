<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;



class RegisterController extends Controller
{
    public function registerIndex()
    {
        return view('back.register.registerUser');
    }

    public function userCreate( RegisterRequest $request)
    {

       Redis::hmset('user',[
        'name'=>$request->name,
        'email'=>$request->email,
        'password' => bcrypt($request->password),

       ]);
       #User::create($request->only(['name', 'email', 'password']));
       
       #Session::flash('success', 'Kayıt başarıyla tamamlandı.');
        return redirect()->route('confirmation');
        
    }


    public function confirmation()
    {
        return view('back.register.confirmation_email');
    }
}
