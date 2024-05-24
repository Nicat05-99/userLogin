<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;



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
      

         $verificationCode = mt_rand(100000, 999999);

        Mail::to($request->email)->send(new VerificationEmailEmail($verificationCode));

        return redirect()->route('confirmation');
        
    }



      #User::create($request->only(['name', 'email', 'password']));
       
       #Session::flash('success', 'Kayıt başarıyla tamamlandı.');~
    public function confirmation()
    {
        return view('back.register.confirmation_email');
    }
}
