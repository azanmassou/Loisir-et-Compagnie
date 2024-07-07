<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\SearchUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\Console\Input\Input;
use Intervention\Image\Facades\Image;

class DashbordController extends Controller
{
    //

    public function posts(SearchPostRequest $request)
    {

        $querry =  Post::query();

        $isValidSearch = false;

        $posts = $querry->recentpost()->paginate(3);

        // $posts = Post::orderByDesc('created_at')->paginate(2);

        // if ($request->has('title')) {

        //     $requestSearch = $request->input('title');

        //     $querry = $querry->where('title', 'like', '%' . $requestSearch . '%')->get();

        //     $isValidSearch = true;

        //     $posts = $querry;
        // }

        // $posts = Post::get(['title', 'content'])->where('created_at', 'orderby', 'decs');

        // dd($posts);

        $user = Auth::user();

        return view('admin.posts', compact('user', 'posts'));
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    // public function show(Post $post)
    // {
    //     $user = Auth::user();

    //     return view('dashbord.show', compact('post', 'user'));

    // }

    
    // public function destroy(Post $post)
    // {
    //     $post->delete();

    //     // dd($post);

    //     return to_route('dashbord.list')->with('success', 'successful making');
    // }
}
