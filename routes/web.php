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
use Illuminate\Support\Facades\Input;

Route::post('/logout', 'Sessioncontroller@logout');


Route::get('/', 'MovieController@collection');

Route::get('/genre/index/{id}/{page}', ['uses' => 'GenreController@index']);

Route::get('/movie/index/{id}', ['uses' => 'MovieController@index']);

Route::get('/movie/listmovies', [
    'as'   => 'listmovies',
    'uses' => 'MovieController@listmovies'
]);

Route::get('/movie/toprated/{id}', ['uses' => 'MovieController@toprated']);

Route::get('/movie/upcoming/{id}', ['uses' => 'MovieController@upcoming']);

Route::get('/movie/nowplaying/{id}', ['uses' => 'MovieController@nowplaying']);

Route::get('/movie/{id}', [
    'as'   => 'show',
    'uses' => 'MovieController@show'
]);

Route::get('/movie/mymovies/{id}', [
    'as'   => 'mymovies',
    'uses' => 'MovieController@mymovies'
]);



//
Route::get('/series/index', [
    'as'   => 'index',
    'uses' => 'SeriesController@index'
]);



Route::get('/series/toprated/{id}', ['uses' => 'SeriesController@toprated']);

Route::get('/series/upcoming/{id}', ['uses' => 'SeriesController@upcoming']);

Route::get('/series/nowplaying/{id}', ['uses' => 'SeriesController@nowplaying']);


Route::get('/series/index/{id}', ['uses' => 'seriesController@index']);


Route::get('/series/{id}', [
    'as'   => 'show',
    'uses' => 'SeriesController@show'
]);

Route::get('/person/{id}', [
    'as'   => 'show',
    'uses' => 'PersonController@show'
]);

Route::get('/person/', [
    'as'   => 'index',
    'uses' => 'PersonController@index'
]);

Route::post( '/search', 'SearchController@store');

Route::post('/search/movie', [
    'as'   => 'movie',
    'uses' => 'SearchController@movie'
]);

Route::post('/search/people', [
    'as'   => 'people',
    'uses' => 'SearchController@people'
]);


Route::post('/search/series', [
    'as'   => 'series',
    'uses' => 'SearchController@series'
]);

//Route::get('/search/{query?}', 'SearchController@searchmulti');
//Route::get('/movie/{id}', 'MovieController@show');
//Route::resource('movie', 'MovieController');
//Route::get('/movie/upcoming', 'MovieController@upcoming');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shop', 'ShopController');
