<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function adminpage(){
        $users = Auth::user();
        return view('admin.admin', compact('users'));
    }
    public function editform(){
        $users = Auth::user();
        $changeUsers = User::all();
        return view('admin.form', compact('users', 'changeUsers'));
    }
    public function check(User $user, Request $request){
        $validated = $request->validate([
            'userId' => 'required',
            'changeRole' => 'required',
        ]);
        session(['changeRole' => $request->all()]);
        $changeRoleUser = User::findOrFail($validated['userId'])->toArray();
        $users = Auth::user();

        return view('admin.check', compact('users', 'changeRoleUser'));
    }
    public function update(Request $request){
        $validated = $request->validate([
            'userId' => 'required',
        ]);
        $user = User::find($validated['userId']);
        $user->lore = session('changeRole.changeRole');
        $user->updated_at = now();
        $user->update();

        $request->session()->forget('changeRole');
        return redirect()->route('admin')
            ->with('message', '保存が完了しました');
    }
}