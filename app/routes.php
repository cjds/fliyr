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
Route::get('/sign-up', function()
{
	return View::make('form');
});
Route::get('/about-us', function()
{
	return View::make('aboutus');
});

Route::get('/hummingbirdadmin',function(){

});

Route::post('/regtest', function()
{
	/*$iconv(in_charset, out_charset, str)nput=Input::all();
	if($input['reg_string']){
		$regnos=Regnos::where('reg_string',$input['reg_string'])->find(1);
		if($regnos->used){
			return 'error';
		}
		else{
			return 'ok';
		}

	}*/	
	$input=Input::all();	
	$request = Request::instance(); 
	$ip = $request->getClientIp();
	$regnos=new Regnos();
	$regnos->user_email=$ip;
	$regnos->reg_string=$input['reg_string'];


	$array=["STARTUPX","HUMMINGBIRD","EN2EM"];	
	if(in_array(strtoupper($input['reg_string']), $array)){
		//$regnos->save();
		return 'ok';
	}
	else{
		//$regnos->save();
		return 'error';
	}
});

Route::post('/regset', function()
{
	$input=Input::all();
	if($input['reg_string']){
		$regnos=Regnos::where('reg_string',$input['reg_string'])->find(1);
		$regnos->used=true;
		$regnos->save();
		return 'ok';
	}	
	else{
		return 'error';
	}
});


Route::get('/sendmail',function(){
	Mail::send('emails.welcome',array(), function($message)
{
    $message->to('cjds@live.com', 'John Smith')->subject('Welcome!');
});
});
