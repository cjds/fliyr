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



Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data

Route::get('/','HomeController@login');

Route::get('ajax/confirm',"UserController@confirm_user");

Route::get('/venturelist',function(){
	return View::make('venturelist');
});

Route::get('/thread','HomeController@thread');

Route::get('/about','HomeController@about');

Route::get('/inbox','HomeController@inbox');

Route::get('/login','HomeController@login');
Route::get('/expertise','HomeController@get_expertise');
Route::get('/myexpertise','HomeController@my_expertise');
Route::get('/myventures','HomeController@my_ventures');
//Route::get('/inbox','HomeController@inbox');
Route::get('/signout','HomeController@signout');
Route::get('/signupsuccess', function()
{
	return View::make('magic');
});

//Route for User
Route::post('ajax/sign-up','UserController@sign_up');
Route::post('ajax/login','UserController@login');

Route::get('ajax/user-data','UserController@user_data');


//Add experience
Route::post('ajax/add-experience','UserController@add_experience');
//Edit User experiences
Route::post('ajax/edit-experience','UserController@edit_experience');

//Create a Venture
Route::post('ajax/add-venture','VentureController@add_venture');

Route::post('ajax/add-position','VentureController@add_position');

Route::get('ajax/get-ventures','VentureController@get_ventures');
Route::get('ajax/get-venture-data','VentureController@get_venture_data');
Route::get('ajax/get-my-ventures','VentureController@get_my_ventures');

Route::get('ajax/get-position-data','VentureController@get_position_data');

Route::get('ajax/get-my-expertise','UserController@get_my_experience');
Route::get('ajax/get-expertise','ExpertController@get_expertise');

Route::post('ajax/post-message','MessageController@send_message');
Route::post('ajax/post-position-message','MessageController@post_position_message');
Route::post('ajax/post-reply','MessageController@post_reply');
Route::get('ajax/get-inbox','MessageController@get_inbox');

Route::get('ajax/get-user-data','UserController@get_user_data');
Route::get('ajax/get-message-thread','MessageController@get_message_thread');
Route::get('ajax/get-notifications','MessageController@get_notifications');
Route::post('ajax/post-experience-message','MessageController@post_experience_message');
/*********************\
/******ADMIN**********\
/*********************/
Route::get('/add-tags','VentureController@get_tags');
Route::get('/ventures','HomeController@get_ventures');

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
