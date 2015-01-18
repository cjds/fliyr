<?php

class SessionModel {

	function create_session($user_name,$user_id){
		Session::put('user_name', $user['user_name']);
		Session::put('user_id', $user['user_id']);
	}

	function handle_redirection(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');
		
		if(!isset($user_id)){
				return Redirect::to('/');
		}
		if($user_id==''){
				return Redirect::to('/');;
		}
		$user=new User;
		if($user->has_experience($user_id))
			return null;
		else
			return Redirect::to('myexpertise');;
	}

	function get_session_data(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');
		
		return ['user_name'=>$user_name,'user_id'=>$user_id];
	}

	function get_user_name(){
		return Session::get('user_name');
	}

	function get_user_id(){
		return Session::get('user_id');
	}

}?>


