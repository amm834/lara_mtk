@extends('layouts.app')
@auth
@section('content')
<form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
  {{method_field('PUT')}}
  @csrf
  <div class="form-grpup">
    <label>Enter Post Name</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label>Choose Category</label>
    <select name="category_id" class="form-control">
      @foreach($categories as $cat)

      <option value="{{$cat->id}}"
        @if($post->category_id == $cat->id)
        selected
        @endif
        >{{$cat->name}}</option>
      @endforeach

    </select>
  </div>

  <div class="form-grpup">
    <label>Enter Post Content</label>
    <input type="text" class="form-control" name="content" value="{{$post->content}}">
  </div>

  <div class="form-group">
    <label>Choose Image</label>
    <input type="file" name="file">

  </div>

  <input type="submit" class="btn btn-info" value="Update">
</form>
<img src="{{asset('images').'/'.$post->featured}}" class="img-fluid">
@endsection
@endauth