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

//Estudiantes
Route::get('/students', 'StudentController@index');
Route::post('/students', 'StudentController@store');
Route::get('/students/{student}', 'StudentController@details')->name('details');
Route::get('/students/edit/{student}', 'StudentController@editView')->name('editView');
Route::post('/students/edit/{student}', 'StudentController@editStudent')->name('editStudent');
Route::get('/students/delete/{student}', 'StudentController@delete')->name('deleteStudent');
//Route::post('/students/edit/{id}', 'StudentController@');

//Empresas
Route::get('/companies', 'CompanyController@index');
Route::post('/companies', 'CompanyController@store');

//Ciclos
Route::get('/grades', 'GradeController@index');



/*Route::get('/students', function(){
    return view('students');
});*/

