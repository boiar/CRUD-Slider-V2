<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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




/* user admin_dashboard routes */
Route::group([
    'namespace' =>'User_Dashboard',
],function (){
    Route::get('/', 'UserDashboardController@index')->name('homepage');


});

Route::group([
    'prefix'     => "/trips",
    'namespace'  =>'User_Dashboard',
],function (){
    Route::get('/', 'SliderController@index')->name('trips.index');
    Route::get('/{id?}', 'SliderController@showTripsDetails')->name('trips.show_trip');

});


Route::group([
    'prefix'    =>'comments',
    'namespace' =>'User_Dashboard'
],function (){
    Route::get('/', 'CommentController@index')->name('comments.index');


});

Route::group([
    'prefix'    =>'about',
    'namespace' =>'User_Dashboard'
],function (){
    Route::get('/', 'AboutUsController@index')->name('about.index');


});


Route::group([
	'prefix'    =>'lang_switch',
	'namespace' =>'User_Dashboard'
],function (){
	Route::post('/', 'LanguageSwitcherController@languageSwitcher')->name('lang_switch.lang_switcher');


});



