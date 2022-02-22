<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        //pagination
        // $postsArr = Post::paginate(10);
        
        //eager loading
        $postsArr =Post::with('user')->get();

        return PostResource::collection($postsArr);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        //capture the data
        $requestedData = request()->all();
        // dd($requestedData);

        //connect to db
        $post = Post::create($requestedData);

        //redirection
        return new PostResource($post);
    }
}
