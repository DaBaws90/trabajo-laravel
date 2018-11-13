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

Route::group(['middleware' => 'auth'], function () {
    // All my routes that needs a logged in user

    //Estudiantes
    Route::get('/students', 'StudentController@index')->name("listStudents");
    Route::post('/students', 'StudentController@store')->name("createStudent");
    Route::get('/students/{student}', 'StudentController@details')->name('details');
    Route::get('/students/edit/{student}', 'StudentController@editView')->name('editView');
    Route::post('/students/edit/{student}', 'StudentController@editStudent')->name('editStudent');
    Route::get('/students/delete/{student}', 'StudentController@delete')->name('deleteStudent');

    //Empresas
    Route::get('/companies', 'CompanyController@index');
    Route::post('/companies', 'CompanyController@store');
    Route::get('/companies/{company}}', 'StudentController@details')->name('details');
    Route::get('/companies/edit/{company}}', 'CompanyController@editView')->name('editView');
    Route::post('/companies/edit/{company}}', 'CompanyController@editCompany')->name('editCompany');
    Route::get('/companies/delete/{company}}', 'CompanyController@delete')->name('deleteCompany');

    //Ciclos
    Route::get('/grades', 'GradeController@index')->name("listGrades");
    Route::post('/grades', 'GradeController@store')->name("createGrade");
    Route::get('/grades/{grade}', 'GradeController@details')->name('details');

});

/*Route::get('/students', function(){
    return view('students');
});*/

