<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postsArr = Post::all();
        // dd($postsArr);

        return view('posts.index', ['posts'=>$postsArr]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($postId)
    {
        $data = Post::find($postId);
        return view('posts.show');
    }

    public function store()
    {
        //capture the data
        $requestedData = request()->all();
        // dd($requestedData);

        //connect to db
        Post::create([
            'title' => $requestedData['title'],
            'description' => $requestedData['description'],
            'posted_by'=> $requestedData['post_creator']
        ]);

        //redirection
        return to_route('posts.index');
    }

    public function edit($postId)
    {
        return view('posts.edit', ['postId' => $postId]);
    }

    public function update()
    {
        return to_route('posts.index');
    }
}
