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

Route::get('/', "StudentController@index")->name("student.index");

// Student Routes
Route::get('/student-add-helper', "StudentController@studentAddHelper")->name("student.add_helper");
Route::post('/student-add', "StudentController@addStudent")->name("student.add_student");
Route::get('/student/delete/{id}', "StudentController@deleteStudent")->name("student.delete_student");
Route::get('/student/edit-helper/{id}', "StudentController@editHelper")->name("student.edit_helper");
Route::post('/student/update/{id}', "StudentController@updateStudent")->name("student.update_student");

// Parent Routes
Route::get('/all-parents', "StudentParentController@index")->name("parent.index");
Route::get('/parent-add-helper', "StudentParentController@addParentHelper")->name("parent.add_helper");
Route::post('/parent-add', "StudentParentController@addParent")->name("parent.add_parent");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
