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
    return view('welcome');
});

// User
Route::resource('/costumer/list-reservation', 'User\ListReservationController');
Route::resource('/costumer', 'User\CostumerController');
Route::resource('/reservation', 'User\ReservationController');
Route::get('/reservation/pdf', 'User\ListReservationController@pdf');



// Admin
Auth::routes();
Route::resource('/admin/manage-admin', 'Admin\ManageAdminController');
Route::resource('/admin/costumer', 'Admin\CostumerController');
Route::resource('/admin/reservation', 'Admin\ReservationController');
Route::resource('/admin/transportation', 'Admin\TransportationController');
Route::resource('/admin/transportation_type', 'Admin\Transportation_typeController');
Route::resource('/admin/rute', 'Admin\RuteController');
Route::resource('/admin', 'Admin\IndexController');




