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

use\App\PostsController;
use Illuminate\Http\Request;
use \App\Post;

Route::get('/', function (){
    return view('welcome');
});



Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);
Route::get('/posts/create',  'PostsController@create');
Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post_id}/comments', ['as'=> 'comments-post', 'uses'=> 'CommentsController@store']);
Route::get('/posts/tag/{tag}', 'TagsController@index')->name('posts-tags');




Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');




Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store');




Route::get('users/{id}', 'UsersController@show')->name('users');


