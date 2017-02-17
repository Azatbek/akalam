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

  Route::group(['middleware' => 'locale'], function () {

    $langPrefixes = array_merge(config('app.locales'), ['']);

    foreach ($langPrefixes as $lang)
    {
        Route::get($lang .'/', function () {
            return view('home');
        });
        Route::get($lang . '/news/{id}', [
            'uses' => 'NewsController@show'
        ]);
        Route::get($lang . '/lyrics/{id}', [
            'uses' => 'LyricsController@show'
        ]);
        Route::post($lang . '/lyrics/store', [
            'uses' => 'LyricsController@store'
        ]);
    }
  });
