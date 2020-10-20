@extends('layouts.app')
@auth
@section('content')
<form action="{{route('category.store')}}" method="post">
  @csrf
  <div class="form-grpup">
    <label>Enter Category Name</label>
      <input type="text" class="form-control" name="name">
  </div>
  <input type="submit" class="btn btn-info" value="Create">
</form>
@endsection
@endauth