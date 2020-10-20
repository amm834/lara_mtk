@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    {{$post->title}}
    {{$cat->name}}
  </div>
  <img src="{{asset('images').'/'.$post->featured}}" class="card-image img-fluid">
  <div class="card-body">
    {{$post->content}}
  </div>
</div>
@endsection