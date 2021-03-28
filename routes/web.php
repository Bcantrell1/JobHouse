<?php

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

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

//Default Home View
Route::get('/', function () {
    return view('index');
});

//Login Actions
Route::post('/doLogin', 'LoginController@attemptLogin');

//Route Actions
Route::post('/doRegister', 'RegisterController@attemptRegister');

//Home View
Route::get('/index', function () {
    return view('index');
});

//Login View
Route::get('/login', function () {
    return view('login');
});

//Register View
Route::get('/register', function () {
    return view('register');
});

// Logged in user's homepage
Route::get('/home', function () {
    return view('home');
});