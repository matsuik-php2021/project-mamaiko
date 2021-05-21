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

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::post('/confirm', 'Auth\RegisterController@confirm')->name('confirm');
Route::post('/save', 'Auth\RegisterController@save')->name('save');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function(){
    Route::get('home','HomeController@index')->name('home');
    Route::resource('books','BookController');
    Route::get('likes','LikeController@index')->name('likes.index');
    Route::post('likes','LikeController@store')->name('likes.post');
    Route::delete('likes','LikeController@destroy')->name('likes.destroy');
});