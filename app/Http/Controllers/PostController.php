<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $postsArr = [['id' => 1, 'title' => 'First Post', 'postedBy'=>'Ahmed', 'createdAt'=>'2022-02-19'], ['id' => 2, 'title' => 'Second Post', 'postedBy'=>'Sue', 'createdAt'=>'2022-02-13']];

        return view('posts.index', ['posts'=>$postsArr]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($postId){
        return view('posts.show');
    }

    public function store(){
        //capture the data
        // $requestedData = request()->all();
        // dd($requestedData);

        //redirection
        return to_route('posts.index');
        
    }

    public function edit($postId){
        return view('posts.edit', ['postId' => $postId]);
    }

    public function update(){
        return to_route('posts.index');
    }
}