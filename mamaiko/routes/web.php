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
    Route::get('/reservation/history', 'ReservationController@show_history')->name('reservation.history');
    Route::get('/reservation/plan', 'ReservationController@show_plan')->name('reservation.plan');
    Route::get('/favoriteindex', 'FavoriteController@index')->name('home.favoriteindex');
    Route::post('/favoritestore', 'FavoriteController@store')->name('favorites.store');
    Route::delete('/favoritedestroy', 'Favoritecontroller@destroy')->name('favorites.destroy');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::redirect('/','home');
        // 会員管理
        Route::get('usersList', 'UserController@index')->name('user.index');
        Route::get('/usersList/{id}/info','UserController@edit')->name('user.edit');
        Route::post('/usersList/info/update','UserController@update')->name('user.update');
        // ホテル管理
        Route::get('hotels', 'HotelController@index')->name('hotel.index');
        Route::get('/hotels/{id}/info','HotelController@show')->name('hotel.show');
        Route::get('/hotels/{id}/edit','HotelController@edit')->name('hotel.edit');
        Route::post('/hotels/info/update','HotelController@update')->name('hotel.update');
        Route::get('/hotels/create','HotelController@create')->name('hotel.create');
        Route::post('/hotels/store','HotelController@store')->name('hotel.store');
        //プラン管理
        Route::get('/plans/{id}/edit','PlanController@edit')->name('plan.edit');
        Route::post('/plans/info/update','PlanController@update')->name('plan.update');
        Route::get('/plans/of{id}/create','PlanController@create')->name('plan.create');
        Route::post('/plans/store','PlanController@store')->name('plan.store');
    });

});
