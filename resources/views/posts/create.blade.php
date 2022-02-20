@extends('layout.app')
@section ('title') Create @endsection
@section('content')
<form method="post" action="{{route('posts.store')}}" class="mt-5">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
      <option value="Ahmed">Ahmed</option>
      <option value="Mohamed">Mohamed</option>
      <option value="Ali">Ali</option>
      <option value="Amr">Amr</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection