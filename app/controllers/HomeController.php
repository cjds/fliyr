<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home(){
		return View::make('newhome');
	}

	public function login(){
		$user_id=Session::get('user_id');
		
		if(isset($user_id)){
			return Redirect::to('/ventures');
		}
		return View::make('landing');
	}


	public function signupsuccess(){
		$session =new SessionModel;
	
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}

	public function confirmuser(){
		$session =new SessionModel;
		
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}

	public function inbox(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		if($redirection!=null)
			return $redirection;
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}

	public function thread(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		if($redirection!=null)
			return $redirection;
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));	
	}

	public function get_ventures(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		if($redirection!=null)
			return $redirection;
	
//		return View::make('test');
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}

	protected function get_expertise(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		if($redirection!=null)
			return $redirection;
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}

	protected function about()
	{
		$session =new SessionModel;
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}


	protected function my_expertise(){
		$session =new SessionModel;
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');

		if(!isset($user_id)){
			return Redirect::to('/');
		}
		if($user_id==''){
			return Redirect::to('/');
		}

		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}


	
	protected function my_ventures(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		if($redirection!=null)
			return $redirection;
		return View::make('magic',array('user_name' => $session->get_user_name(), 'user_id'=>$session->get_user_id() ));
	}
	
	protected function signout(){
		Session::flush();
		return Redirect::to('/');
	}
}
