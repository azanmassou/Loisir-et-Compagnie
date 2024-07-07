<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    //

    public function profile(){

        $user = Auth::user();

        $posts = $user->post;

        // $posts = Post::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return view('adminer.views.profile' , compact('posts', 'user',))->with('success');
    }
}
