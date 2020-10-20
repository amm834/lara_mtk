@extends('layouts.app')
@auth
@section('content')
<form action="{{route('category.update',$category->id)}}" method="post">
  @csrf
  {{method_field('Put')}}
  <div class="form-grpup">
    <label>Enter Category Name</label>
      <input type="text" class="form-control" name="name" value="{{$category->name}}">
  </div>
  <input type="submit" class="btn btn-info" value="Update">
</form>
@endsection
@endauth