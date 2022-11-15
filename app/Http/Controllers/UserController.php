<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //
    public function isLogged(Request $req)
    {
        
    }

    public function loginpage()
    {
        return view('login');
    }

    public function registerpage()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $ret = ['msg'=> 'Credenciales incorrectas'];
        $credentials = $request->only(['email', 'password']);

        
        if (Auth::attempt($credentials)) {
            //session()->regenerate();
            Auth::login(User::where('email', $credentials['email'])->first(), true);
            
            if (Auth::check()) {
                $ret = ['msg' => '200'];
            }

        } else {
        }
        return Response::json($ret);
    }

    public function register()
    {

    }
}
