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
		$user_confirmpassword=$input['user_confirmpassword'];
		$pdo=DB::connection()->getPdo();

		$user_model=new User();

		if($user_confirmpassword!=$input['user_password'])
			return '{"result": "fail","message":"Passwords do not match"}'; 

		$user=$user_model->find_user_by_email($user_email);
		if($user){
			return '{"result": "fail","message":"This e-mail already exists"}';
		}

		
		$user=$user_model->add_user($user_name,$user_email,$user_password);
		if($user!=false){
			$name=explode(';',$user_name);
			
			$data=['full_name'=>$name[0].' '.$name[1],'user_email'=>$user_email,'username'=>$name[0],'confirmationstring'=>$user['randomstring'],'user_id'=>$user['user_id']];
			//random_string
			Mail::send('emails.register', $data, function($message) use ($data) {
		    	$message->to($data['user_email'], $data['full_name'])->subject('Welcome to Fliyr');
			});
			return '{"result": "ok","redirect":"signupsuccess"}';;
		}
		else{
			echo $user;
			return '{"result": "fail","message":"There was an unknown error"}';;		
		}
	}

	protected function login(){

		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		$user_email=$input['user_email'];
		$user_password=$input['password'];
		$user_model=new User();
		$user=$user_model->find_user_by_email($user_email);		
		if($user){

			if(password_verify($user_password,$user['user_password'])){
				Session::put('user_name', $user['user_name']);
				Session::put('user_id', $user['user_id']);
				return '{"result": "ok","redirect":"ventures"}';
			}
			else
				return '{"result": "fail","message":"The username or password was incorrect"}';
		}
		else{
			return '{"result": "fail","message":"The username or password was incorrect"}';
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
		
		if(isset($input['experience_tags']))
			$experience_tags=explode(',', $input['experience_tags']);
		else
			$experience_tags=array();

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


	protected function confirm_user()
	{
		$input=Input::all();
		$user=new User();

		if(!isset($input['confirmationstring']))
			return Redirect::to('/');
		else if(!isset($input['user_id']))
			return Redirect::to('/');
		$message=$user->confirm_user($input['confirmationstring'],$input['user_id']);

		if($message){
			return Redirect::to('/confirmed');
		}
		else
			return Redirect::to('/');
	}

	protected function get_experience(){
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM experience ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM experience_tag WHERE experience_id=:experience_id ORDER BY created_at DESC");
			$query->bindParam(':experience_id', $value['experience_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();
			if ($row[$key]['user_id']==$session->get_user_id()) {
				$row[$key]['creator']=true;
			}			
			else{
				$row[$key]['creator']=false;
			}
		}
		return  json_encode($row);

	}

	protected function get_user_data(){
		$input=Input::all();
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM user WHERE user_id=:user_id");
		$query->bindParam('user_id',$input['user_id']);

		$query->execute();
		$row=$query->fetch();
		$username=explode(';', $row['user_name']);
		$row['user_name']=$username[0];
		return  json_encode($row);		
	}

	protected function get_my_experience(){
		$input=Input::all();
		$session =new SessionModel;
		$user_id=$session->get_user_id();
		if($user_id==null){
			return ['response'=>'fail','redirect'=>'/'];
		}
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM experience WHERE user_id=:user_id");
		$query->bindParam('user_id', $user_id);
		$query->execute();
		$row=$query->fetch();
		$row['user_name']=$session->get_user_name();
		$row['user_id']=$user_id;
		$query = $pdo->prepare("SELECT  tag_name FROM experience_tag e,tag t WHERE experience_id=:experience_id AND e.tag_id = t.tag_id ORDER BY e.created_at DESC");
		$query->bindParam(':experience_id', $row['experience_id']);
		$query->execute();
		$row['tags']=$query->fetchAll();
		return  json_encode($row);

	}
	/**
	*
	*/
	
}
?>