<?php

use Illuminate\Support\Facades\Cookie;
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

if (!Cookie::get('user_id')) {
    Route::get('login', 'LoginController@showForm')->name('user.login');
    Route::post('login', 'LoginController@login')->name('user.login.submit');
}

Route::group(['middleware' => ['logged']], function () {
    Route::get('/', 'FrontController@index');
    Route::put('/survey/store', 'SurveyController@store')->name('survey.store');
    Route::post('/survey/completed/relatedusers', 'SurveyController@getRelatedUsersHtml')->name('survey.completed.getRelated');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::redirect('/', '/admin/users');
        Route::get('users', 'UserController@index')->name('users.index');
        Route::resource('questions', 'QuestionController')->except(['show']);
        Route::get('surveys', 'SurveyController@index')->name('surveys.index');
        Route::delete('surveys/{survey}', 'SurveyController@destroy')->name('surveys.destroy');
    });

    if (!Cookie::get('is_admin')) {
        Route::get('login', 'LoginController@showForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login.submit');
    }
    Route::get('logout', 'LoginController@logout')->name('logout');
});
