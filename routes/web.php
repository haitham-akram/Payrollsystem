<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace' => 'Admin', 'middleware' => ['is_admin', 'auth']], function () {
    Route::get('/employees', 'EmployeeController@index')->name('employees');
    Route::get('/addEmployee', 'EmployeeController@create')->name('create_employee');
    Route::post('/store_Employee', 'EmployeeController@store')->name('store_employee');
    Route::get('/delete_employee/{id}', 'EmployeeController@destroy')->name('employee.delete');
    Route::get('/edit_employee/{id}', 'EmployeeController@edit')->name('employee.edit');
    Route::post('/update_employee/{id}', 'EmployeeController@update')->name('employee.update');
    // department route
    Route::get('/departments', 'DepartmentController@index')->name('department.index');
    Route::post('/store_department', 'DepartmentController@store')->name('department.store');
    Route::get('/edit_department/{id}', 'DepartmentController@edit')->name('department.edit');
    Route::post('/update_department/{id}', 'DepartmentController@update')->name('department.update');
    Route::get('/delete_departemnt/{id}', 'DepartmentController@destroy')->name('department.delete');
    // contract route
    Route::get('/contract', 'ContractController@index')->name('contract.index');
    Route::get('/createContract', 'ContractController@create')->name('contract.create');
    Route::post('/storeContract', 'ContractController@store')->name('contract.store');
    Route::get('/editContract/{id}', 'ContractController@edit')->name('contract.edit');
    Route::post('/updateContract/{id}', 'ContractController@update')->name('contract.update');
    Route::get('/deleteContract/{id}', 'ContractController@destroy')->name('contract.delete');
    // leave route
    Route::get('/leaves', 'LeaveController@index')->name('leave.index');
    Route::post('/storeLeaves', 'LeaveController@store')->name('leave.store');
    Route::get('/editLeaves/{id}', 'LeaveController@edit')->name('leave.edit');
    Route::post('/updateLeaves/{id}', 'LeaveController@update')->name('leave.update');
    Route::get('/deleteLeaves/{id}', 'LeaveController@destroy')->name('leave.delete');
    // deductions route
    Route::get('/deductions', 'DeductionController@index')->name('deduction.index');
    Route::get('/add_deduction', 'DeductionController@create')->name('deduction.create');
    Route::post('/store_deduction', 'DeductionController@store')->name('deduction.store');
    Route::get('/edit_deduction/{id}', 'DeductionController@edit')->name('deduction.edit');
    Route::post('/update_deduction/{id}', 'DeductionController@update')->name('deduction.update');
    Route::get('/delete_deduction/{id}', 'DeductionController@destroy')->name('deduction.delete');
    // Transactions route
    Route::get('/Transactions', 'TransactionController@index')->name('transaction.index');
    Route::get('/Transactions/{id}', 'TransactionController@show')->name('transaction.show');
    Route::get('/Add_Transaction', 'TransactionController@create')->name('transaction.create');
    Route::post('/Store_Transaction', 'TransactionController@store')->name('transaction.store');
    Route::get('/edit_Transaction/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::post('/update_Transaction/{id}', 'TransactionController@update')->name('transaction.update');
    Route::get('/delete_Transaction/{id}', 'TransactionController@destroy')->name('transaction.delete');
});
Route::get('/employee/pdf/{id}', 'Admin\TransactionController@generatePDF')->name('pdf.download');


Route::group(['namespace' => 'FullTime', 'middleware' =>  ['is_full', 'auth']], function () {
    //profile route
    Route::get('/profile/{id}', 'FullTimeController@index')->name('profile');
    Route::get('/profile/edit/{id}', 'FullTimeController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}', 'FullTimeController@update')->name('profile.update');
    //transaction route
    Route::get('/transaction/{id}', 'FullTimeTransactionController@index')->name('transaction');
    //payment route
    Route::get('/payment/{id}', 'FullTimePaymentController@index')->name('payment');
    Route::get('/payment/edit/{id}', 'FullTimePaymentController@edit')->name('payment.edit');
    Route::post('/payment/update/{id}', 'FullTimePaymentController@update')->name('payment.update');
    //leave
    Route::post('/leave/edit/{id}', 'FullTimeLeaveController@update')->name('full.leave.update');
});
Route::group(['namespace' => 'Casual', 'middleware' => ['is_casual', 'auth']], function () {
    //profile route
    Route::get('/casual_profile/{id}', 'CasualController@index')->name('casual.profile');
    Route::get('/casual_profile/edit/{id}', 'CasualController@edit')->name('casual.profile.edit');
    Route::post('/casual_profile/update/{id}', 'CasualController@update')->name('casual.profile.update');
    //timecard route
    Route::get('/timecard/{id}', 'CasualTimecardController@index')->name('casual.timecard.index');
    Route::get('/add_timecard/{id}', 'CasualTimecardController@create')->name('casual.timecard.create');
    Route::get('/delete_timecard/{id}', 'CasualTimecardController@destroy')->name('casual.timecard.delete');
    Route::post('/create_timecard/{id}', 'CasualTimecardController@store')->name('casual.timecard.store');
    Route::post('/update_timecard/{id}', 'CasualTimecardController@update')->name('casual.timecard.update');
    //payment route
    Route::get('/casual_payment/{id}', 'CasualPaymentController@index')->name('casual.payment');
    Route::get('/casual_payment/edit/{id}', 'CasualPaymentController@edit')->name('casual.payment.edit');
    Route::post('/casual_payment/update/{id}', 'CasualPaymentController@update')->name('casual.payment.update');
});
