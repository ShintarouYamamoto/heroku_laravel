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

Route::get('/', 'TopController@top');

Route::get('/return', 'UserController@return');

Auth::routes();

Route::get('/user/{user_id}', 'UserController@show')->name('mypage');

Route::get('/user/{user_id}/edit', 'UserController@edit');

Route::post('/user/{user_id}/edit', 'UserController@update');

Route::get('/user/{user_id}/follow', 'FollowController@store');

Route::get('/user/{user_id}/unfollow', 'FollowController@delete');

Route::get('/user/{user_id}/following_list', 'FollowController@following_list');

Route::get('/user/{user_id}/followers_list', 'FollowController@followers_list');

Route::get('/new', 'PostController@new');

Route::post('/new', 'PostController@create');

Route::get('/timeline', 'PostController@timeline');

Route::get('/timeline/{post_id}', 'PostController@detail');

Route::get('/timeline/{post_id}/delete', 'PostController@delete');

Route::get('/like/store/{post_id}', 'LikeController@store');

Route::get('/like/delete/{post_id}', 'LikeController@delete');

Route::post('/comment/store/{post_id}', 'CommentController@store');

Route::get('/reaction/store/{post_id}', 'MatchController@store');

Route::get('/reaction/delete/{post_id}', 'MatchController@delete');

Route::get('/reaction/list/{post_id}', 'PostController@list');

Route::get('/reaction/list/{reaction_id}/permit', 'MatchController@permit');

Route::get('/chat', 'ChatController@list');

Route::get('/chat/{chat_room_id}', 'ChatController@room');

Route::post('/chat/store/{chat_room_id}', 'ChatController@store');

Route::get('/news', 'UserController@news');
