<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManageController;

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
    return view('register');
});
Route::view('loginview','login');
Route::view('register','register');
// Route::view('dashboard','UserManageController@dashboarddata');
Route::view('add/{id}','blog.create');

/* User manager routes */
Route::get('dashboard','UserManageController@dashboarddata');
Route::post('register','UserManageController@registerUser');
Route::post('login','UserManageController@loginUser');


/* Blog routes */

Route::post('addBlog/{id}','BlogController@addBlog');
Route::get('edit/{id}','BlogController@updateviewBlog');
Route::post('edit/update/{id}','BlogController@updateBlog');
Route::get('del/{id}','BlogController@deleteBlog');