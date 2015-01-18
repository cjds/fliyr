<?php 


class User{

	protected $pdo="";

	function __construct(){
		$this->pdo=DB::connection()->getPdo();
	}

	function find_user_by_email($user_email){
		$query = $this->pdo->prepare("SELECT  * FROM user WHERE user_email = :user_email");
		$query->bindParam(':user_email', $user_email);
		$query->execute();
		return $query->fetch();	
	}

	function find_user_by_username($user_name){
		$query = $this->pdo->prepare("SELECT  * FROM user WHERE user_name = :user_name");
		$query->bindParam('user_name', $user_name);
		$query->execute();
		return $query->fetch();		
	}

	function add_user($user_name,$user_email,$user_password){
		$message=true;
		try {
		    $query=$this->pdo->prepare("INSERT INTO user (user_name,user_email,user_password) VALUES (:user_name,:user_email,:user_password)");
			$query->bindParam('user_name', $user_name);
			$query->bindParam('user_email', $user_email);
			$query->bindParam('user_password', $user_password);
			$query->execute();		

		} 
		catch (PDOException $e) {
		    $message=false;
		}
		
		return $message;
	}


	function has_experience($user_id){
		$message=true;
		try {
		    $query = $this->pdo->prepare("SELECT  * FROM experience WHERE user_id = :user_id");
		    $query->bindParam('user_id',$user_id);
		    $query->execute();
		    $row=$query->fetch();
		    if(!$row){
		    	$message=false;
		    }

		} 
		catch (PDOException $e) {
		    $message=false;
		}
		
		return $message;	
	}
}
?>