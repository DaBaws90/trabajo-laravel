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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // All my routes that needs a logged in user

    //Estudiantes
    Route::resource('students', 'StudentController');

    //Empresas
    Route::get('/companies', 'CompanyController@index');
    Route::post('/companies', 'CompanyController@store');
    Route::get('/companies/{company}}', 'StudentController@details')->name('details');
    Route::get('/companies/edit/{company}', 'CompanyController@editView')->name('editView');
    Route::post('/companies/edit/{company}', 'CompanyController@editCompany')->name('editCompany');
    Route::get('/companies/delete/{company}', 'CompanyController@delete')->name('deleteCompany');

    //Ciclos
    Route::get('/grades', 'GradeController@index')->name("listGrades");
    Route::post('/grades', 'GradeController@store')->name("createGrade");
    Route::get('/grades/{grade}', 'GradeController@details')->name('details');
    Route::get('/grades/edit/{grade}', 'GradeController@editView')->name('editViewGrades');
    Route::post('/grades/edit/{grade}', 'GradeController@editGrade')->name('editGrade');
    Route::get('/grades/delete/{grade}', 'GradeController@delete')->name('deleteGrade');

});

/*Route::get('/students', function(){
    return view('students');
});*/

