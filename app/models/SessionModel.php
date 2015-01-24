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

	function handle_json_redirection(){
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');
		
		if(!isset($user_id)){
				return ['response'=>'fail','redirect'=>'/'];
		}
		if($user_id==''){
				return ['response'=>'fail','redirect'=>'/'];
		}
		$user=new User;
		if($user->has_experience($user_id))
			return null;
		else
			return ['response'=>'fail','redirect'=>'myexpertise'];
	}
	function get_session_data(){
		$user_name=explode(';',Session::get('user_name'));
		$user_name=$user_name[0];
		$user_id=Session::get('user_id');
		
		return ['user_name'=>$user_name,'user_id'=>$user_id];
	}

	function get_user_name(){
		$user_name=explode(';',Session::get('user_name'));
		$user_name=$user_name[0];
		return $user_name;
	}

	function get_user_id(){
		return Session::get('user_id');
	}

}?>


