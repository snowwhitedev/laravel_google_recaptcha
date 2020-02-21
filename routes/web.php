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

use App\Post;

Route::get('/', function () {
    $posts = Post::latest()->limit(3)->get();
    return view('welcome')->with('posts', $posts);
});
Route::get('/sitemap.xml', 'SiteMapGeneratorController@index')->name('siteMap.index');

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@show');
Route::get('blog/categories/{slug}', 'BlogController@category');
Route::get('blog/tags/{slug}', 'BlogController@tag');
Route::get('blog/authors/{authorId}', 'BlogController@author');

Route::post('process', 'ProcessController@index')->name('process');

Route::get('contact', 'MainController@contact')->name('contact');
Route::post('contact', 'MainController@postContact')->name('contact');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('/login', 'Admin\AuthController@index')->name('login');
    Route::post('/login', 'Admin\AuthController@postLogin')->name('login');
    Route::get('/logout', 'Admin\AuthController@logout')->name('logout');

    Route::resource('posts', 'Admin\PostsController');
    Route::resource('categories', 'Admin\CategoriesController');

    Route::get('/sitemap', 'Admin\SiteMapController@index')->name('sitemap');
    Route::post('/sitemap', 'Admin\SiteMapController@update')->name('sitemap');

    Route::get('/messages', 'Admin\MessagesController@index')->name('messages.index');
    Route::get('/messages/{message}/show', 'Admin\MessagesController@show')->name('messages.show');
    Route::get('/messages/{message}/delete', 'Admin\MessagesController@destroy')->name('messages.destroy');

    Route::post('/messages/{message}/reply', 'Admin\RepliesController@store')->name('replies.store');
    Route::get('/replies/{reply}/delete', 'Admin\RepliesController@destroy')->name('replies.destroy');
});
