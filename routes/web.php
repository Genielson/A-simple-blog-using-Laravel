<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world','HelloWorldController@index');

Route::get('/post/${slug}', function($slug){
    return $slug;
})->name('post.single');
// Rota com apelido

Route::prefix('posts')->name('post.')->group(function(){

    Route::get('/', 'PostController@index')->name('index');

    Route::get('/create', 'PostController@create')->name('create');

    Route::post('/save', 'PostController@save')->name('save');

});


Route::namespace('Admin')->prefix('admin')->group(function(){
      
    Route::get('/users/', 'UserController@index')->name('users.index');

    Route::get('/posts/', 'PostController@index')->name('posts.index');

});


Route::get('/user/{id}', function($id){
    return $slug;
})->where(['id'=>'[0-9]+']);
