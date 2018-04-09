<?php

// $stripe = resolve('App\Billing\Stripe');

// dd(resolve('App\Billing\Stripe'));

Route::get('/', 'BlogController@index')->name('home');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog','BlogController@store');
Route::get('/blog/{blog}', 'BlogController@show');

// Route::get('/blogs/tags/{tag}', 'BlogController@index');

Route::post('/blog/{blog}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');







