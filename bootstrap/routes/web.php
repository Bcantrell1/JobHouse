<?php

/*
 * Project Name: Milestone 1
 * Version: 1.0
 * Programmers: Brian Cantrell
 * Date: 3/25/2021
 */

use Illuminate\Support\Facades\Route;

//Default Home View
Route::get('/', function () {
    return view('index');
});

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


//Login / Registration Actions
Route::post('/doLogin', 'LoginController@attemptLogin');
Route::post('/doRegister', 'RegisterController@attemptRegister');

// Logged in user's homepage
Route::get('/home', function () {
    return view('home');
});

//Logout action
Route::get('/logout', 'LoginController@logout');

//Routes for user profile and edit
Route::get('/myprofile', 'UserController@loadProfile');
Route::get('/users/{id}/profile/edit', 'UserController@loadProfileEdit');
Route::post('/users/{id}/profile/update', 'UserController@applyProfileEdit');

//Routes for user resume and edit
Route::get('/users/{id}/resume', 'UserController@index');
Route::get('/users/{id}/add', 'UserController@loadAdd');
Route::get('/users/{id}/edit', 'UserController@loadEdit');
Route::post('/users/{id}/apply', 'UserController@addResumeItem');
Route::get('/users/{id}/{resumeItemId}/delete', 'UserController@deleteResumeItem');

//Routes for Jobs
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/create', 'JobController@loadCreate');
Route::post('/jobs/add', 'JobController@createJob');
Route::post('/jobs/{jobId}/update', 'JobController@updateJob');
Route::get('/jobs/{jobId}/edit', 'JobController@loadEdit');
Route::delete('/jobs/{jobId}/delete', 'JobController@deleteJob');

//Routes for Admin actions
Route::get('/admin', 'AdminController@index');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::put('/admin/update/{id}', 'AdminController@update');
Route::delete('/admin/delete/{id}', 'AdminController@delete');