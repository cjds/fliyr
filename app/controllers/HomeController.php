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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function login(){
		return View::make('landing');
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
	

		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  experience.*,user.user_name FROM experience,user WHERE user.user_id=experience.user_id ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  tag_name FROM experience_tag,tag WHERE experience_id=:experience_id AND experience_tag.tag_id=tag.tag_id ORDER BY experience_tag.created_at DESC");
			$query->bindParam(':experience_id', $value['experience_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}

		return View::make('expertisepage', array('user_name' => $session->get_user_name(),'user_id'=>$session->get_user_id(),'experience'=>$row));	
	}


	protected function my_expertise(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');

		if(!isset($user_id)){
			return Redirect::to('/');
		}
		if($user_id==''){
			return Redirect::to('/');
		}

		return View::make('myexpertise', array('user_name' => $user_name,'user_id'=>$user_id));
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
