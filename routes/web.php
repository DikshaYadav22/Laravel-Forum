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


Auth::routes(['verify'=>true]);
Route::get('/', function () {
    return view('welcome');
});

Route::resource('channels', 'ChannelController');
Route::resource('discussions', 'DiscussionsController');
Route::resource('discussions/{discussion}/reply', 'RepliesController');
Route::get('notifications', 'NotificationsController@index')->name('notifications');

Route::get('/home', 'HomeController@index')->name('home');
