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

Route::get('/logout', 'UserController@logout');

//Routes for user profile and edit
Route::get('/myprofile', 'UserController@loadNewEdit');
Route::get('/users/{id}/profile/edit', 'UserController@loadProfileEdit');
Route::post('/users/{id}/profile/update', 'UserController@applyProfileEdit');

//Routes for Jobs
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/create', 'JobController@loadCreate');
Route::post('/jobs/add', 'JobController@createJob');
Route::get('/jobs/{jobId}/edit', 'JobController@loadEdit');
Route::post('/jobs/{jobId}/update', 'JobController@updateJob');
Route::delete('/jobs/{jobId}/delete', 'JobController@deleteJob');

//Routes for Resume
Route::get('/users/{id}/resume', 'UserController@index');
Route::get('/users/{id}/add', 'UserController@resumeAdd');
Route::post('/users/{id}/apply', 'UserController@addResumeItem');
Route::get('/users/{id}/edit', 'UserController@loadEdit');
Route::post('/users/{id}/{resumeItemId}/apply', 'UserController@updateResumeItem');
Route::get('/users/{id}/{resumeItemId}/edit', 'UserController@resumeEdit');
Route::delete('/users/{id}/{resumeItemId}/delete', 'UserController@deleteResumeItem');

//Routes for Admin actions
Route::get('/admin', 'AdminController@index');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::put('/admin/update/{id}', 'AdminController@update');
Route::delete('/admin/delete/{id}', 'AdminController@delete');