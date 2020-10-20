<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

  Route::get('home', 'HomeController@index');

  Route::resource('/category', CategoryController::class);
  Route::resource('/post',PostController::class);



});