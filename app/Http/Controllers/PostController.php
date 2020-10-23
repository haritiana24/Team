<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function index(Post $post)
    {
       $post = Post::latest()->paginate(5);
        return view('posts.index', compact('post'));
    }

    public function store()
    {
       $data =  \request()->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect()->route('profiles.show', ['user' => \auth()->user()]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
