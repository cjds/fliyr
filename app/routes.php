<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});
Route::get('/signup', function()
{
	return View::make('form');
});
Route::get('/earlyaccess', function()
{
	return View::make('form');
});

Route::get('/aboutus', function()
{
	return View::make('aboutus');
});

Route::post('/sendmail',function(){
	Mail::later(5, 'emails.welcome', $data, function($message)
{
    $message->to('cjds@live.com', 'John Smith')->subject('Welcome!');
});
});
