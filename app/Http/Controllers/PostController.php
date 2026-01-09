<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use ftp;

class PostController extends Controller
{
    public function mainpage(){
        $users = Auth::user();
        $posts = Post::with('user')->orderBy('id', 'desc')->get();
        return view('user.post', compact('users', 'posts'));
    }
    public function create(){
        $users = Auth::user();
        $userflag = null;
        return view('user.postForm', compact('users', 'userflag'));
    }
    public function store(Request $request){
    $validated = $request->validate([
        'title' => ['required'],
        'body'  => ['required', 'max:255'],
        ]);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title   = $validated['title'];
        $post->body    = $validated['body'];
        $post->save();

        return redirect()->route('main')->with('posted', '投稿しました');
    }
    public function postsEdit(Post $post){
        $users = Auth::user();
        $userflag = true;
        $posts = Post::with('user')->find($post)->toArray();

        return view('user.postForm', compact('userflag', 'users', 'posts', 'post'));
    }
    public function postUpdate(Request $request, Post $post, User $user){
    $validated = $request->validate([
        'title' => ['required'],
        'body'  => ['required', 'max:255'],
        ]);
        $post->update($validated);

        return redirect()
            ->route('main')
            ->with('posted', '更新しました');
    }
    public function destroy(Post $post){
        $post->delete();

        return redirect()->route('main')
        ->with('posted', '投稿を削除しました');
    }
}
