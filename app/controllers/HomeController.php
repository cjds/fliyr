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

	public function get_ventures(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');

		return View::make('magic',array('user_name' => $user_name, 'user_id'=>$user_id ));
	}

	protected function get_expertise(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');
		if(!isset($user_id)){
				return Redirect::to('/');
			}
			if($user_id==''){
				return Redirect::to('/');
			}
	

		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM experience ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  tag_name FROM experience_tag,tag WHERE experience_id=:experience_id AND experience_tag.tag_id=tag.tag_id ORDER BY experience_tag.created_at DESC");
			$query->bindParam(':experience_id', $value['experience_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}


		if(!isset($user_id)){
			return Redirect::to('/');
		}
		if($user_id==''){
			return Redirect::to('/');
		}
		return View::make('expertisepage', array('user_name' => $user_name,'user_id'=>$user_id,'experience'=>$row));	
	}

	public function createventure(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');
		if(!isset($user_id)){
			return Redirect::to('/');
		}
		if($user_id==''){
			return Redirect::to('/');
		}
		return View::make('createventure', array('user_name' => $user_name));
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

		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');

		if(!isset($user_id)){
			return Redirect::to('/');
		}
		if($user_id==''){
			return Redirect::to('/');
		}

		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture where creator_id=:user_id ORDER BY created_at DESC");
		$query->bindParam(':user_id',$user_id);
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			foreach ($row[$key]['positions'] as $key2 => $postion) {
				$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
				$query->bindParam(':position_id', $row[$key]['positions'][$key2]['position_id']);
				$query->execute();
				$row[$key]['positions'][$key2]['tags']=$query->fetchAll();
			}
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}



		return View::make('myventures', array('user_name' => $user_name,'user_id'=>$user_id,'ventures'=>$row));
	}
	
	protected function inbox(){

	}

	protected function signout(){
		Session::flush();
		return Redirect::to('/');
	}
}
