<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/posts/channels/{channel}', [ 'uses' => 'PostController@showPostsInChannel', 'as' => 'posts.channel' ]);
Route::resource('/posts', 'PostController');

Route::resource('/comments', 'CommentController', [
	'only' => ['store']
]);

Route::resource('/users', 'UserController', [
	'only' => ['index', 'show']
]);

Route::get('/account/edit',		[ 'uses' => 'AccountController@edit',   'as' => 'account.edit' ]);
Route::patch('/account/update', [ 'uses' => 'AccountController@update', 'as' => 'account.update' ]);


Route::group(['prefix' => '/admin'], function () {
	Route::get('/', [ 'uses' => 'AdminController@index', 'as' => 'admin.index' ]);
	Route::get('/posts', [ 'uses' => 'AdminController@postsIndex', 'as' => 'admin.posts.index' ]);
	Route::get('/channels', [ 'uses' => 'AdminController@channelsIndex', 'as' => 'admin.channels.index' ]);
});