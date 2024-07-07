<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Requests\SearchPostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function welcome()
    {

        return view('welcome');
    }
   
   

    // public function create()
    // {

    //     $user = Auth::user();

    //     $post = new Post;

    //     return view('home.create', compact('post', 'user'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request, Post $post)
    {
        //

        $user_id = Auth::id();

        // $user = Auth::user();

        $creadentials = $request->validated();

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/post', $imageName);
        }

        // Redimensionner l'image à une largeur de 300 pixels et une hauteur proportionnelle
        // $resizedImage = Image::make($imagePath)->resize(300, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->image = $imageName;
        // $post->save();

        $creadentials['user_id'] = $user_id;

        $creadentials['image'] = $imageName;

        $post = Post::create($creadentials);

        // $user->posts()->save($post);

        // dd($post);

        return to_route('posts.index');
    }
}
