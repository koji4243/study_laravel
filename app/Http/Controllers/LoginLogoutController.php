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
            // 認証に成功したら、セッションを再生成する
            $request->session()->regenerate();
            if (Auth::guard('admin')) {
                return redirect()->intended('/admin');
            }
            return redirect()->route('main');
        }
    }
    public function logout(Request $request)
    {    
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
    }
    if (Auth::check()) {
        Auth::logout();
    }
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
