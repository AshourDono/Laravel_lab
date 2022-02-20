@extends('layout.app')
@section('content')
<form method="post" action="{{route('posts.update',$postId)}}" class="mt-5">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="text" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
      <option value="1">Ahmed</option>
      <option value="2">Mohamed</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection