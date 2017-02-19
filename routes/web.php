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
        Route::get($lang . '/news', [
            'uses' => 'NewsController@index'
        ]);
        Route::get($lang . '/news/{id}', [
            'uses' => 'NewsController@show'
        ]);
        Route::get($lang . '/lyrics', [
            'uses' => 'LyricsController@index'
        ]);
        Route::get($lang . '/lyrics/{id}', [
            'uses' => 'LyricsController@show'
        ]);
        Route::get($lang . '/audiobooks', [
            'uses' => 'AudiobookController@index', 'as' => 'AudioRoute'
        ]);
        Route::get($lang . '/audiobooks/{cat}', [
            'uses' => 'AudiobookController@index', 'as' => 'AudioRoute'
        ]);
        Route::get($lang . '/audiobooks/{cat}/{id}', [
            'uses' => 'AudiobookController@show', 'as' => 'AudioRoute'
        ]);
        Route::post($lang . '/lyrics/store', [
            'uses' => 'LyricsController@store'
        ]);
        Route::get($lang . '/category/{id}', [
            'uses' => 'LyricsController@showCategory'
        ]);
        Route::get($lang . '/categories', [
            'uses' => 'LyricsController@getAllCategories'
        ]);

        Route::get($lang .'/language/{language}', function($language){

            $prev = explode('/',app('request')->create(URL::previous())->server('REQUEST_URI'));
            foreach ($prev as $value) {
                    $prev[1] = $language;           
            }
            $route = implode('/',$prev);
            app()->setLocale($language);
            if(isset($prev[2]) && $prev[2]=='language'){
                return redirect($language);
            } else {
                return redirect($route);
            }
        });
        

        //login routes

        // Authentication Routes...
        Route::get($lang . '/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post($lang . '/login', 'Auth\LoginController@login');
        Route::post($lang . '/logout', 'Auth\LoginController@logout')->name('logout');

        // Password Reset Routes...
        Route::get($lang . '/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post($lang . '/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get($lang . '/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post($lang . '/password/reset', 'Auth\ResetPasswordController@reset');
    }  
  });
//   Route::controllers([
//     'login' => 'Auth\LoginController',
//     'password' => 'Auth\ResetPasswordController',
    
// ]);


