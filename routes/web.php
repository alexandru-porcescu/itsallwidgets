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
    return redirect('flutter-apps', 301);
});

Route::get('about', 'HomeController@about');
Route::get('sitemap.xml', 'FlutterAppController@sitemap');
Route::get('flutter-apps', 'FlutterAppController@index');

Route::get('google', function () {
    return view('google');
});
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('login', function () {
    return redirect('/');
})->name('login');

Route::get('logout', 'Auth\LoginController@logout');
Route::get('log_error', 'HomeController@logError');

Route::feeds();

Route::get('flutter-app/{slug}', 'FlutterAppController@show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('flutter-apps/submit', 'FlutterAppController@create');
    Route::post('flutter-apps/submit', 'FlutterAppController@store')->middleware('slug');

    Route::get('flutter-app/{flutter_app}/approve', 'FlutterAppController@approve');
    Route::get('flutter-app/{flutter_app}/edit', 'FlutterAppController@edit');
    Route::put('flutter-app/{flutter_app}', 'FlutterAppController@update');
});
