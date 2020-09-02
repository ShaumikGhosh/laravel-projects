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

// get routes
Route::get("/", "UserController@user")->name("create_user");
Route::get("/all-users", "UserController@allUsers")->name("all_users");
Route::get("/all-posts", "UserController@allPosts")->name("all_posts");
Route::get("/post-here", "UserController@postPage")->name("post_page");
Route::get("/user/view/{id}", "UserController@viewUser")->name("view_user");
Route::get("/post/delete/{id}", "UserController@deletePost")->name("delete_post");

// post routes
Route::post("/add-user", "UserController@adduser")->name("add_user");
Route::post("/add-post", "UserController@addPost")->name("add_post");
