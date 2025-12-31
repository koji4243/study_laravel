<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function adminpage(){
        $users = Auth::user();
        return view('admin.admin', compact('users'));
    }
    public function editform(){
        return view('admin.form');
    }
}
