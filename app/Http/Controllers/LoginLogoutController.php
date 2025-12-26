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

    public function login(Request $request){
        //  リクエストのデータを検証する
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            // 認証に成功したら、セッションを再生成する
            $request->session()->regenerate();
            
            return redirect()->route('main');
        }
    }
    public function logout(Request $request)
    {
        // 1. ユーザーをログアウトさせる
        Auth::logout();
        // 2. セッションを無効にする
        $request->session()->invalidate();
        // 3. 新しいCSRFトークンを再生成する
        $request->session()->regenerateToken();
        // 4. トップページにリダイレクトする
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
