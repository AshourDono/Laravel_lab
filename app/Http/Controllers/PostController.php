<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        PruneOldPostsJob::dispatch();
        // dd('done');
        $postsArr = Post::paginate(10);
        
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

    public function store(StorePostRequest $request)
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

    public function update(StorePostRequest $request, $postId)
    {
        // $post = Post::find($postId);
        $requestedData = request()->only(['title','description','user_id']);


        $post= Post::find($postId);

        $post->slug = null;
        
        $post->update([
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
