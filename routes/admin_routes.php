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



/* Admin Roots */
Route::group([
    'middleware' => ['auth'],
    'prefix'    =>'admin_dashboard',
    'namespace' =>'Admin_Dashboard'
], function () {
    Route::get('/', 'DashboardController@index')->name('admin.homepage');


    Route::prefix('sliders')->group(function (){
        Route::get('/', 'SliderController@index')->name('slider.index');
        Route::delete('destroy/{id}', 'SliderController@destroy')->name('slider.destroy');
        Route::post('save/{id?}', 'SliderController@saveSlider')->name('slider.save_slider');
        Route::get('get_slider/{id?}', 'SliderController@getSlider')->name('slider.get_slider');
        Route::post('copy_slider', 'SliderController@copySliderImgs')->name('slider.copy_slider');



    });


    Route::prefix('trips')->group(function (){
        Route::get('/', 'TripController@index')->name('trip.index');
        Route::post('update_trip_activation', 'TripController@updateActivateTrip')->name('trip.update_activation');
        Route::delete('destroy/{id}', 'TripController@destroy')->name('trip.destroy');
        Route::post('save/{id?}', 'TripController@saveTrip')->name('trip.save_trip');
        Route::get('get_trip/{id?}', 'TripController@getTrip')->name('trip.get_trip');
    });






});





Route::group([
    'middleware' => ['PreventBackUrl'],
    'prefix'     =>'admin_dashboard',
    'namespace'  =>'Admin_Dashboard'
],function (){

    Route::get('/login',[\App\Http\Controllers\Admin_Dashboard\Auth\LoginController::class,'getViewLogin'] )->name("login");
    Route::post('/login',[\App\Http\Controllers\Admin_Dashboard\Auth\LoginController::class,'login']);
    Route::get('/logout', [\App\Http\Controllers\Admin_Dashboard\Auth\LoginController::class, 'logout'])->name("logout");

});




