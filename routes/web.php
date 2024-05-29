<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/city', 'UserController@chooseCity')->name('user.chooseCity');
    Route::get('/{city_id}/cinema', 'UserController@chooseCinema')->name('user.chooseCinema');
    Route::post('/city', 'UserController@cityStore')->name('user.cityStore');
    Route::post('/{city_id}/cinema', 'UserController@cinemaStore')->name('user.cinemaStore');
    Route::get('/{city_id}/{cinema_id}', 'UserController@main')->name('user.main');
    Route::post('/mainStore', 'UserController@mainStore')->name('user.mainStore');
    Route::get('/{city_id}/{cinema_id}/{film_id}', 'UserController@film')->name('user.film');
    Route::get('/{city_id}/{cinema_id}/{film_id}/{session_id}','UserController@order')->name('user.order');
    Route::post('/orderStore', 'UserController@orderStore')->name('user.orderStore');
    Route::get('/{city_id}/{cinema_id}/{film_id}/{session_id}/{seatCount}/check','UserController@check')->name('user.check');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/main', 'IndexController@index')->name('admin.main');
    });
    // User admin route
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/', 'UserController@store')->name('admin.user.store');
        Route::get('/{user}', 'UserController@show')->name('admin.user.show');
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::patch('/{user}', 'UserController@update')->name('admin.user.update');
        Route::delete('/{user}', 'UserController@delete')->name('admin.user.delete');
    });
    // City admin route
    Route::group(['namespace' => 'City', 'prefix' => 'cities'], function () {
        Route::get('/', 'CityController@index')->name('admin.city.index');
        Route::get('/create', 'CityController@create')->name('admin.city.create');
        Route::post('/', 'CityController@store')->name('admin.city.store');
        Route::get('/{city}', 'CityController@show')->name('admin.city.show');
        Route::get('/{city}/edit', 'CityController@edit')->name('admin.city.edit');
        Route::patch('/{city}', 'CityController@update')->name('admin.city.update');
        Route::delete('/{city}', 'CityController@delete')->name('admin.city.delete');
    });
    // Cinema admin route
    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinemas'], function () {
        Route::get('/', 'CinemaController@index')->name('admin.cinema.index');
        Route::get('/create', 'CinemaController@create')->name('admin.cinema.create');
        Route::post('/', 'CinemaController@store')->name('admin.cinema.store');
        Route::get('/{cinema}', 'CinemaController@show')->name('admin.cinema.show');
        Route::get('/{cinema}/edit', 'CinemaController@edit')->name('admin.cinema.edit');
        Route::patch('/{cinema}', 'CinemaController@update')->name('admin.cinema.update');
        Route::delete('/{cinema}', 'CinemaController@delete')->name('admin.cinema.delete');
    });
    // Film admin route
    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function () {
        Route::get('/', 'FilmController@index')->name('admin.film.index');
        Route::get('/create', 'FilmController@create')->name('admin.film.create');
        Route::post('/', 'FilmController@store')->name('admin.film.store');
        Route::get('/{film}', 'FilmController@show')->name('admin.film.show');
        Route::get('/{film}/edit', 'FilmController@edit')->name('admin.film.edit');
        Route::patch('/{film}', 'FilmController@update')->name('admin.film.update');
        Route::delete('/{film}', 'FilmController@delete')->name('admin.film.delete');
    });
    // CinemaFilms admin route
    Route::group(['namespace' => 'CinemaFilm', 'prefix' => 'cinemaFilms'], function () {
        Route::get('/', 'CinemaFilmController@index')->name('admin.cinemaFilm.index');
        Route::get('/create', 'CinemaFilmController@create')->name('admin.cinemaFilm.create');
        Route::post('/', 'CinemaFilmController@store')->name('admin.cinemaFilm.store');
        Route::get('/{cinema_id}/{film_id}', 'CinemaFilmController@show')->name('admin.cinemaFilm.show');
        Route::delete('/{cinema_id}/{film_id}', 'CinemaFilmController@delete')->name('admin.cinemaFilm.delete');
    });
    // Sessions admin route
    Route::group(['namespace' => 'Session', 'prefix' => 'cinemaSessions'], function () {
        Route::get('/', 'SessionController@index')->name('admin.session.index');
        Route::get('/create', 'SessionController@create')->name('admin.session.create');
        Route::post('/', 'SessionController@store')->name('admin.session.store');
        Route::get('/{session_id}', 'SessionController@show')->name('admin.session.show');
        Route::delete('/{session_id}', 'SessionController@delete')->name('admin.session.delete');
    });
    // OrderHistory admin route
    Route::group(['namespace' => 'OrderHistory', 'prefix' => 'orderHistories'], function () {
        Route::get('/', 'OrderHistoryController@index')->name('admin.orderHistory.index');
        Route::get('/{orderHistory_id}', 'OrderHistoryController@show')->name('admin.orderHistory.show');
        Route::delete('/{orderHistory_id}', 'OrderHistoryController@delete')->name('admin.orderHistory.delete');
    });
});


