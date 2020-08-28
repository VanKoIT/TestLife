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

Auth::routes();

Route::get('/', 'TestController@index');
Route::get('dev', function () {
    return view('development');
});
Route::get('home', 'HomeController@index')->name('home');
Route::post('email/exist', 'CheckController@emailExist');

Route::middleware('auth')->group(function () {
    Route::middleware('test.guest')->group(function () {
        Route::get('tests/{testId}', 'QuestionController@index')
             ->name('testQuestions');
        Route::post('like/add', 'LikeController@likeAdd');
        Route::post('like/delete', 'LikeController@likeDelete');
    });

    /*Route::match(['get', 'post'], 'tests/add', 'TestController@add')
         ->name('testAdd');*/
    Route::get('history/{testId}', 'HomeController@history')
         ->name('testHistory')->middleware('test.author');
    Route::get('result/{attemptId}', 'ResultController@displayAttempt')
         ->middleware('attempt.user')->name('testResult');
    Route::post('result', 'ResultController@saveResults');
});

