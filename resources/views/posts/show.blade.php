@extends('layouts.app')
@section('content')

<div class="card p-2 my-3">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
</div>

<div class="card p-2 my-3">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name: {{$post->user? $post->user->name: "not found"}}</h5>
    <h5 class="card-title">Email: {{$post->user? $post->user->email: "not found"}}</h5>
    <h5 class="card-title">Created At: {{$post->user? $post->created_at: "not found"}}</h5>
  </div>
</div>


@endsection