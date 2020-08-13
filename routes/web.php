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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('github')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('/','GithubController@index');
        Route::get('/search','GithubController@showSearchGit')->name('github.users.search');
        Route::get('{name}','GithubController@showProfileId')->name('github.users.profile');
        Route::get('{name}/{repo}','GithubController@showRepo')->name('github.users.repo');
    });
});



