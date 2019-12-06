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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Resources
Route::resource('post', 'PostController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('education', 'EducationController')->middleware('auth');
Route::resource('interest', 'InterestController')->middleware('auth');
Route::resource('work', 'WorkController')->middleware('auth');
//comment in a post
Route::post('post/comment/{id}',
    ['as' => 'post.comment', 'uses' => 'PostController@postcomment']);
//react in a post
Route::post('react','PostController@react');
Route::get('search',
    ['as' => 'search', 'uses' => 'SearchController@index']);
Route::post('addfriend/{id}','FriendController@add');
Route::post('confirmfriend/{id}','FriendController@confirm');


Route::get('chat','ChatController@index');
Route::post('sendchat','ChatController@sendMessage');
Route::post('chathistory','ChatController@chatHistory');

Route::get('friends/{id}','FriendController@showFriends');
Route::get('/activity', 'ActivityController@index')->name('activity');
Route::resource('notification', 'NotificationController')->middleware('auth');

Route::get('images/{id}','PostController@images');



