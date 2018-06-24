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

Route::get('/apply', function () {
    return view('register');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/messages', 'HomeController@getMessages')->name('messages');
//Route::get('/events', 'HomeController@getEvents')->name('events');
Route::get('/videos', 'HomeController@getVideos')->name('videos');
Route::resource('/albums', 'AlbumController');
Route::resource('/events', 'EventController');
Route::resource('/imgs', 'GalleryController');
Route::resource('/videos', 'VideosController');
Route::resource('/msg', 'MessageController');
Route::resource('/upcoming', 'UpcomingController');
Route::resource('/songs', 'SongController');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/', 'PagesController@getIndex')->name('first');
Route::get('/biography', 'PagesController@getBio')->name('biography');
Route::get('/discography', 'PagesController@getDisco')->name('discography');
Route::get('/charity', 'PagesController@getCharity')->name('charity');
Route::get('/gallery', 'PagesController@getGallery')->name('gallery');
Route::get('/footer', 'PagesController@getFooter')->name('Footer');
Route::get('/contact_us', 'PagesController@getContactUs')->name('contactUs');
Route::post('/contact_us', 'PagesController@postContactUs');
Route::get('{id}', ['as' => 'single', 'uses' => 'PagesController@getSingle']);
Route::get('/video/{id}', ['as' => 'video', 'uses' => 'PagesController@getVideo']);
Route::get('/song/{id}', ['as' => 'song', 'uses' => 'PagesController@getSong']);

/*
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
*/