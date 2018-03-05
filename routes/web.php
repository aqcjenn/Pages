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

Route::get('/ohayou', function () {
    echo "Yoroshiku onegaishimasu!";
});

Route::get('foo', function () {
    return 'Hello World';
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('page','PageController');
Route::post('/page/create', 'PageController@create');
Route::get('/page/view/{page_id}', 'PageController@view');
Route::get('/page/all', 'PageController@getAll');

Route::resource('comment','CommentController');
Route::post('/comment/create', 'CommentController@create');