<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postsArr = Post::paginate(10);
        // dd($postsArr);

        return view('posts.index', ['posts'=>$postsArr]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=>$users]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return view('posts.show', ['post'=> $post]);
    }

    public function store()
    {
        //capture the data
        $requestedData = request()->all();
        // dd($requestedData);

        //connect to db
        Post::create($requestedData);

        //redirection
        return to_route('posts.index');
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' =>$users]);
    }

    public function update($postId)
    {
        // $post = Post::find($postId);
        $requestedData = request()->all();


        Post::find($postId)->update([
            'title' => $requestedData['title'] , 'description' => $requestedData['description'],
            'user_id' => $requestedData['user_id']
        ]);

        return to_route('posts.index');
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        return to_route('posts.index');
    }
}
