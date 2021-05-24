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

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::post('/confirm', 'Auth\RegisterController@confirm')->name('confirm');
Route::post('/save', 'Auth\RegisterController@save')->name('save');
Route::get('/', 'HotelController@toppage')->name('toppage');
Route::get('/search_results', 'HotelController@index')->name('search_results');

Route::group(['middleware'=>['auth']],function(){
    Route::get('home','HomeController@index')->name('home');
    Route::get('/mypage','HomeController@mypage')->name('mypage');
    Route::get('/user_info/update','HomeController@update')->name('home.update');
    Route::post('/user_info/confirm','HomeController@confirm')->name('home.confirm');
    Route::post('/user_info/store','HomeController@store')->name('home.store');
    Route::get('/withdraw','HomeController@withdraw')->name('withdraw');
    Route::get('/destroy','HomeController@destroy')->name('destroy');
    Route::get('/plan/{id}/reservation','ReservationController@create')->name('reservation.create');
    Route::post('/reservation/confirm','ReservationController@confirm')->name('reservation.confirm');
    Route::post('/reservation/store','ReservationController@store')->name('reservation.store');
    Route::get('/plans/{id}', 'HotelController@planshow')->name('planshow');
    Route::get('/hotels/{id}', 'HotelController@hotelshow')->name('hotelshow');
});

Route::namespace('Manager')->prefix('manager')->name('manager.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:manager')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});
