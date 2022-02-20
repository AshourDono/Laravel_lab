@extends('layout.app')
@section ('title') Index @endsection
@section('content')

<div class="text-center">
  <a href="{{route('posts.create')}}" class="btn btn-success my-3">Create Post</a>
</div>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user? $post->user->name: "not found"}}</td>
      <td>{{$post->created_at}}</td>
      <td><a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">Show</a></td>
      <td><a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a></td>
      <td>
        <form action="{{route('posts.destroy',$post['id'])}}" method="post">
          @csrf
          @method('DELETE')
          <button href="#" class="btn btn-danger show_confirm" data-toggle="tooltip">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  {{ $posts->onEachSide(5)->links() }}
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
  $('.show_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
</script>
@endsection