<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Requests\SearchPostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(SearchPostRequest $request)
    {

        $querry =  Post::query();

        $user = Auth::user();

        // $querry =  User::query();

        // $posts = $querry->orderBy('created_at', 'desc');

        $isValidSearch = false;

        // Récupérer tous les posts avec le nombre de likes
        $posts = $querry->withCount('likes');

        // $users = $querry->withCount('post');

        // dd($posts);

        if ($request->has('title')) {
            $requestSearch = $request->input('title');
            $posts = $posts->where('title', 'like', '%' . $requestSearch . '%');
            $isValidSearch = true;
        }

        $posts = $posts->orderByDesc('created_at')->isblocked()->paginate(2);

        // $posts = $posts->isblocked();

        // dd($posts);

        $user = Auth::user();


        return view('adminer.views.index', compact('user', 'posts',))->with('success');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $user = Auth::user();

        $post = new Post;

        return view('adminer.views.post-create', compact('post', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request)
    {
        //

        // dd($request->validated());

        $user_id = Auth::id();

        $creadentials = $request->validated();

        $imageName = null;

        if ($request->hasFile('image')) {

            // create image manager with desired driver
            // $manager = new ImageManager(
            //     new Driver()
            // );

            // dd($manager);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/post', $imageName);
        }

        // Redimensionner l'image à une largeur de 300 pixels et une hauteur proportionnelle
        // $resizedImage = Image::make($imagePath)->resize(300, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });


        $creadentials['user_id'] = $user_id;

        $creadentials['image'] = $imageName;

        $creadentials['iSet'] = "Add New Post";

        $post = Post::create($creadentials);

        return to_route('posts.dashbord')->with('success', 'Adding Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('admin.post', compact('post'));
    }
    public function me()
    {
        $user = Auth::user();

        // dd($user);

        $posts = Post::where('user_id', $user->id)->orderByDesc('created_at')->paginate(2);

        // dd($user->posts_count);

        return view('adminer.views.post-me', compact('posts', 'user'))->with('success');

        // return view('adminer.views.post-me', compact('post',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $user = Auth::user();

        return view('adminer.views.post-edit', compact('post', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPostRequest $request, Post $post)
    {
        //

        // dd($request->validated());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/post', $imageName);
            $post->image = $imageName;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->iSet = "Update his Post";
        $post->created_at = now();
        $post->update();

        // $user = $post->user;

        // $post->save();

        // dd($post);

        return to_route('posts.dashbord')->with('success', 'Updating Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        // dd($post);

        return back()->with('success', 'Deleting Successfully');
    }

    // public function like(Post $post, Request $request)
    // {

    //     $user = $request->user(); // Obtenez l'utilisateur actuel

    //     $post->like($user);

    //     dd($user);

    //     // dd($post->like($user));

    //     return redirect()->route('posts.index');
    // }

    // public function unlike(Post $post,  Request $request)
    // {
    //     $user = $request->user(); // Obtenez l'utilisateur actuel

    //     $post->unlike($user);

    //     return redirect()->route('posts.index');
    // }

    public function liking(Request $request, Post $post)
    {

        $post = Post::find($post->id);

        if (!$post) {
            return response()->json([
                'error' => 'Post not found',
            ], 404);
        }

        $user = Auth::user();

        $userId = $user->id;

        $user = User::find($userId);

        if (!$user) {

            return response()->json([
                'message' => 'Une eurreu s\'est produite...Veillez vous connecter ....',
                // 'status' => 'unlike',
                // 'count' => Post::find(1)->likes->count(),
                // 'id' => request()->postId,
                // 'request' => $request,
            ], 401);
        }


        if ($post->isLikedBy($user)) {

            $post->unlike($user);

            return response()->json([
                'status' => 'unlike',
                'message' => 'Post unliked successfully',
                'count' => Post::find($post->id)->likes->count(),
                'id' => $post->id,
                // 'request' => $request,
            ], 200);
        } else {

            $post->like($user);

            return response()->json([
                'status' => 'like',
                'message' => 'Post liked successfully',
                // 'postId' => $postId,
                // 'user' => $user,
                'count' => Post::find($post->id)->likes->count(),
                'id' => $post->id
            ], 200);
        }


    }

    // public function unlike(Request $request)
    // {
    //     // $postId = $request->input('post_id');
    //     $post = Post::find(1);
    //     if (!$post) {
    //         return response()->json(['error' => 'Post not found'], 404);
    //     }
    //     $user = User::find(1);

    //     // Code to handle unliking the post
    //     // Update post likes count in database

    //     if ($user) {

    //         $post->unlike($user);

    //     }
    //     return response()->json(['message' => 'Post unliked successfully'], 200);
    // }

    // Méthode pour commenter un post
    public function comment(Request $request, Post $post)
    {
        // Code pour ajouter un commentaire au post
    }

    // Méthode pour partager un post
    public function share(Request $request, Post $post)
    {
        // Code pour partager le post
    }

    public function myPost()
    {
        return view('my-post');
    }

    public function fresh(Request $request)
    {

        $posts = Post::orderByDesc('created_at')->paginate(2);

        return response()->json([
            "status" => true,
            "data" => $posts
        ]);
    }
    public function block(Request $request, Post $post)
    {

        // dd($post->is_blocked);

        if ($post->is_blocked) {

            $post->is_blocked = false;

            $post->save();
        } else {
            $post->is_blocked = true;

            $post->save();
        }

        return back();
    }
    
}
