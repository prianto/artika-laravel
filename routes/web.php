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

if (env('APP_ENV') === 'production') {
  \URL::forceScheme('https');
}

Route::get('/', 'WelcomeController@index');

Route::get('category/all', 'CategoryController@all');

Route::get('category/{slug}', 'CategoryController@single');

Route::get('search', 'SearchController@result');

Route::get('contact', function () {
  return view('contact.index');
});

Route::post('contact', 'ContactController@submit');

Route::get('contact/sent', function () {
  if (session('messageSent')) {
    return view('contact.sent');
  } else {
    return redirect('contact');
  }
});

Route::get('user/{name}', 'UserController@single');

Route::get('page/{slug}', 'PostController@page');

Route::get('{slug}', 'PostController@article');

Route::get('test/error', 'TestController@error');
