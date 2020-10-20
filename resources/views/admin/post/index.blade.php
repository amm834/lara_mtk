@extends('layouts.app')
@auth
@section('content')
<a href="{{route('post.create')}}" class="btn btn-success my-3">Add Post</a>
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}

</div>
@endif
    <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Cat id</th>
      <th>Name</th>
      <th class="text-center" colspan="3">Manage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->category_id}}</td>
      <td>{{$post->title}}</td>
      <td colspan="3" class="text-center">
        <a class="btn btn-sm text-dark" href="{{route('post.edit',$post->id)}}">Edit</a>
        <a class="btn btn-sm btn-danger">Delete</a>
        <a class="btn btn-sm btn-primary" href="{{route('post.show',$post->id)}}">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
@endauth