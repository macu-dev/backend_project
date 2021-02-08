<?php

use Illuminate\Support\Facades\Route;

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
// para que funcione el servidor ./artisan serve
Route::get('/', function () {
    return view('home.home');
});
//  ->name('home'); //le ponemos un nombre a la barra

Route::get('post', function () {
    return view('post.index');
});


//lleva tdoo el protocolo de http
Route::resource('post', 'PostController');

//con el arroba le decimos a que metodo queremos que acceda y le ponemos un alias
Route::group(['prefix' => 'post'], function () {
    Route::post('search', 'PostController@search')->name('post.search');
});

