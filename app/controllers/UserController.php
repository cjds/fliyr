<?php

class UserController extends Controller {

	/**
	 * Signs up the user for the site
	 *
	 * @return void
	 */
	protected function sign_up()
	{
		$input=Input::all();
		//input
		$user_name=$input['user_name'];
		$user_email=$input['user_email'];
		$user_password=password_hash($input['user_password'],PASSWORD_DEFAULT);

		$pdo=DB::connection()->getPdo();

		$sql="INSERT INTO user (user_name,user_email,user_password) VALUES ('".$user_name."','".$user_email."','".$user_password."')";
		$pdo->exec( $sql );
		return 'ok';
	}

	protected function login(){

		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		$user_email=$input['user_email'];
		$user_password=$input['password'];	
		$query = $pdo->prepare("SELECT  * FROM user WHERE user_email = :user_email");
		$query->bindParam(':user_email', $user_email);
		
		$query->execute();
		$row=$query->fetchAll();	
		if($row){
			if(password_verify($user_password,$row[0]['user_password'])){
				Session::put('user_name', $row[0]['user_name']);
				Session::put('user_id', $row[0]['user_id']);
				return '{"result": "ok"}';

//				return '{"user":'.json_encode($row[0]).'}';
			}
			else
				return '{"result": "fail"}';
		}
		else{
			return '{"result": "fail"}';
		}
	}

	protected function user_data(){

		$pdo=DB::connection()->getPdo();
		$input=Input::all();
		$user_id=$input['user_id'];
		$query = $pdo->prepare("SELECT  * FROM user WHERE user_id = :user_id ");
		$query->bindParam(':user_id', $user_id);
		$query->execute();
		$row=$query->fetchAll();	
		if($row){
			return json_encode($row[0]);
		}
		else{
			return '{"result": "fail"}';
		}
	}


	// The next 2 functions may be clubbed together at one point

	/**
	 * Adds experience for the first time
	 *
	 * @return void
	 */
	protected function add_experience(){
		$input=Input::all();
		//input
		$user_id=$input['user_id'];
		$experience_tags=explode(',', $input['experience_tags']);
		foreach ($experience_tags as $key => $value)
			$experience_tags[$key]=substr($value, 1);

		$user_description=$input['user_description'];
		$pdo=DB::connection()->getPdo();


		$query = $pdo->prepare("SELECT  * FROM experience WHERE user_id=:user_id ORDER BY created_at DESC");
		$query->bindParam(':user_id', $user_id);
		$query->execute();
		$experience=$query->fetchAll();

		if(!$experience){
			$sql="INSERT INTO experience (user_id,description,created_at) VALUES ('".$user_id."','".addslashes($user_description)."',NOW())";
			$pdo->exec( $sql );
			$experience_id=$pdo->lastInsertId();

			foreach ($experience_tags as $tag) {
				$query = $pdo->prepare("SELECT  tag_id FROM tag WHERE tag_name = :tag");
				$query->bindParam(':tag', $tag);
				$query->execute();
				$row=$query->fetchAll();
				$tag_id=-1;
				if(!$row){
					$sql="INSERT INTO tag (tag_name,tag_description) VALUES ('".$tag."','')";
					$pdo->exec( $sql );
					$tag_id=$pdo->lastInsertId();	
				}
				else{
					$tag_id=$row[0]['tag_id'];
				}
				$sql="INSERT INTO experience_tag (experience_id,tag_id) VALUES ('".$experience_id."','".$tag_id."')";
				$pdo->exec( $sql );
			}
		}
		else{
			$query=$pdo->prepare("UPDATE experience SET description=:user_description WHERE user_id=:user_id");

			$query->bindParam(':user_id', $user_id);
			$query->bindParam(':user_description', $user_description);
			$query->execute();

			$experience_id=$experience[0]['experience_id'];

			$sql="DELETE FROM experience_tag WHERE experience_id=".$experience_id;
			$pdo->exec( $sql );
			foreach ($experience_tags as $tag) {
				$query = $pdo->prepare("SELECT  tag_id FROM tag WHERE tag_name = :tag");
				$query->bindParam(':tag', $tag);
				$query->execute();
				$row=$query->fetchAll();
				$tag_id=-1;
				if(!$row){
					$sql="INSERT INTO tag (tag_name,tag_description) VALUES ('".$tag."','')";
					$pdo->exec( $sql );
					$tag_id=$pdo->lastInsertId();	
				}
				else{
					$tag_id=$row[0]['tag_id'];
				}
				$sql="INSERT INTO experience_tag (experience_id,tag_id) VALUES ('".$experience_id."','".$tag_id."')";
				$pdo->exec( $sql );
			}			
		}
		return 'ok';

	}

	/**
	 * Edits the current experience of the user
	 *
	 * @return void
	 */
	protected function edit_experience(){

	}


	protected function get_experience(){
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM experience ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM experience_tag WHERE experience_id=:experience_id ORDER BY created_at DESC");
			$query->bindParam(':experience_id', $value['experience_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();		
		}
		return  json_encode($row);

	}

	protected function get_my_experiene(){
		$input=Input::all();
		$user_id=$input['user_id'];
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM experience WHERE user_id=:user_id ORDER BY created_at DESC");
		$query->bindParam(':user_id', $user_id);
		$query->execute();
		$row=$query->fetchAll();
		$row=$row[0];
		$query = $pdo->prepare("SELECT  tag_name FROM experience_tag e,tag t WHERE experience_id=:experience_id AND e.tag_id = t.tag_id ORDER BY e.created_at DESC");
		$query->bindParam(':experience_id', $row['experience_id']);
		$query->execute();
		$row['tags']=$query->fetchAll();
		return  json_encode($row);

	}
	/**
	*
	*
	*/
}
?>