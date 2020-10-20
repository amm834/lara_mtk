@extends('layouts.app')
@auth
@section('content')
<a href="{{route('category.create')}}" class="btn btn-success my-3">Add New</a>
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}

</div>
@endif
<table class="table table-striped">

  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th class="text-center">Manage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->name}}</td>
      <td colspan="2" class="text-center">
        <a href="{{ route('category.edit',$category->id)  }}" class="btn btn-info btn-sm mx-2">Edit</a>
        <form action="{{route('category.destroy',$category->id)}}" method="post">
          @csrf
          {{method_field('DELETE')}}
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@endauth