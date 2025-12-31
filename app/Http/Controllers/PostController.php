<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function mainpage(){
        $users = Auth::user();
        $posts = Post::with('user')->get();
        return view('user.post', compact('users', 'posts'));
    }
}
