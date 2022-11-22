<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

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

    public function register(Request $req)
    {   
        $ret = ['msg' => 'registro invalido'];

        $user = User::where('email', $req->email)->first();

        // Check if email already exists
        if($user) {
            $ret = ['msg' => 'La direccion ingresada ya se encuentra registrada', 'status' => 'ERR'];
            return $ret;
        }
        if($req->password != $req->password2){
            $ret = ['msg' => 'Las contraseñas no coinciden', 'status' => 'ERR'];
            return $ret;
        }
        
        $user = new User();
        $user->admin = 0;
        $user->name = $req->nyp;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        $ret = ['msg' => 'Registro exitoso!', 'action' => '/', 'status' => 'OK'];

        // Make Login
        Auth::login($user, true);

        return $ret;

    }

    public function logout(Request $req) {
        Session::flush();

        Auth::logout();
        return ['action' => 'location.href = "/";'];
    }
}
