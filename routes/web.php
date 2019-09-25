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



Route::get('login', function () {
    return view('index');
})->name('login');

Route::post('login', "Auth\LoginController@login")->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('logout',"Auth\LoginController@logout")->name('logout');

    Route::get('/', function () {
        return view('index');
    });

    Route::get('dashboard',"SysController@index")->name('dashboard');
    Route::get('settings',"SysController@settings")->name('settings');

    Route::get('loans/repayments',"LoanController@repayments")->name("loans.repayments");
    Route::get('loans/penalties',"LoanController@repayments")->name("loans.penalties");

    Route::resource('loans',"LoanController");
    Route::resource('clients',"ClientController");
    Route::resource('schemes',"SchemeController");

});
