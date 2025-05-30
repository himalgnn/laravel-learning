<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RegisterRequest;
use App\Models\User;

use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function showLogin()
    {
        return view('backend.user.login');
    }
   
    function showRegister()
    {
        return view('backend.user.register');
    }
    function showForgotPassword()
    {
        return view('backend.user.forgot_password');
    }
    
    function register(RegisterRequest $request){
        try{
            $user = User::create($request->all());
            if($user){
                return redirect()->route('backend.showLogin')->with('success','User Registered Successfully');
            }else{
                return redirect()->back()->with('error', 'User Registration Failed');
            }
        }catch(Exception $ex){
            return redirect()->back()->with('error','Error');
        }
    }
}
