<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {

    $posts = Post::all();
    return view('admin.post.index', compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
    $categories = Category::all();
    return view('admin.post.create', compact('categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
  $file = $request->file('file');
  $file_name = uniqid().$file->getClientOriginalName();
  $file->move(public_path().'/images/',$file_name);
  
  Post::create([
    'category_id'=>$request->get('category_id'),
    'title'=>$request->get('title'),
    'slug'=>Str::slug($request->get('title'),'-'),
    'content'=>$request->get('content'),
    'featured'=>$file_name
    ]);
    return redirect(route('post.index')); 
  
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //
    $post = Post::find($id);
    $cat = $post->category;
    return view('admin.post.show',compact('post','cat'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    //
    $categories = Category::all();
    $post = Post::find($id);
    return view('admin.post.edit',compact('categories','post'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
}