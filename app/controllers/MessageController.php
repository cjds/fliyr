<?php

class MessageController extends Controller {

	/**
	 * Signs up the user for the site
	 *
	 * @return void
	 */
	protected function send_message()
	{
		$input=Input::all();
		$sender_id=$input['sender_id'];
		$sender_id=$input['receiver_id'];
		$message=$input['message'];
		$message_type=$input['message_type'];
		$sql="INSERT INTO position (position_name,position_description,venture_id,created_at) VALUES ('".$position_name."','".$position_description."','".$venture_idS."',NOW())";
		$pdo->exec( $sql );
		$position_id=$pdo->lastInsertId();

	}

	protected function get_inbox(){
		$input=Input::all();
		$user_id=$input['user_id'];
	}

	protected function get_message_thread(){
		$input=Input::all();
		$user_id=$input['user_id'];
		$other_id=$input['other_id']; 	
	}

	protected function flag_message(){
		$input=Input::all();
		$user_id=$input['message_id'];
	}
}
?>