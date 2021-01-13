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

// Route::get('/', function () {
//     return view('ApplyJob.JobApplicationForm');
// });
Route::get('/','JobApplication\EmployeeController@index');
Route::post('employee_store','JobApplication\EmployeeController@store');
Route::get('employeeList','JobApplication\EmployeeController@list');
Route::get('edit/{id}','JobApplication\EmployeeController@edit')->name('employee.edit');
Route::post('employee_update/{id}','JobApplication\EmployeeController@update');
Route::get('deleteEmployee',"JobApplication\EmployeeController@delete")->name('employeeDelete');