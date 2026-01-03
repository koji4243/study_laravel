<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginLogoutController extends Controller
{
    public function loginform(){
        return view('login');
    }
    public function registerform(){
        return view('register');
    }

    public function login(Request $request, User $user){
        //  リクエストのデータを検証する
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->can('admin')) {
                return redirect('/main/admin');
            }
            return redirect('/main/posts');
        }
        
    }
    public function logout(Request $request)
    {    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('top');
    }
    public function register(Request $request){
        $req = $request->validate([
            'name' =>  ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $users = new User(); 
        $users->name = $req['name'];
        $users->email = $req['email'];
        $users->password = Hash::make($req['password']);
        $users->save();

        return redirect()->route('login');
    }
}
