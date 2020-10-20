@extends('layouts.app')
@auth
@section('content')
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-grpup">
    <label>Enter Post Name</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label>Choose Category</label>
    <select name="category_id" class="form-control">
      @foreach($categories as $cat)

      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach

    </select>
  </div>

  <div class="form-grpup">
    <label>Enter Post Content</label>
    <input type="text" class="form-control" name="content">
  </div>

  <div class="form-group">
    <label>Choose Image</label>
    <input type="file" name="file">

  </div>

  <input type="submit" class="btn btn-info" value="Create">
</form>
@endsection
@endauth