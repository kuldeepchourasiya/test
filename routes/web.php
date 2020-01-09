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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get_by_category', 'ReportController@get_by_category');
Route::get('/report_test', 'ReportController@report_test');
Route::get('/remove_report_test', 'ReportController@remove_report_test');
Route::get('/fetch_report_test', 'ReportController@fetch_report_test');
Route::get('/report_proceed/{id}', 'ReportController@report_proceed');
Route::get('/sample_proceed/{id}', 'SampleCollectController@report_proceed');
Route::get('/proceed_doctor/{id}', 'AssignDoctorController@proceed_doctor');
Route::get('/smpl_tst_proceed/{id}', 'SampleTestingController@report_proceed');
Route::get('/rpt_cmplt_proceed/{id}', 'ReportCompleteController@proceed_billing');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('test','TestController');
    Route::resource('test_category','TestCategoryController');
    Route::resource('patient','PatientController');
    Route::resource('report','ReportController'); 
    Route::resource('assign_doctor','AssignDoctorController');
    Route::resource('billing','BillingController');
    Route::resource('report_complete','ReportCompleteController');
    Route::resource('sample_collection','SampleCollectController');
    Route::resource('sample_testing','SampleTestingController'); 
});