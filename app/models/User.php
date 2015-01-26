<?php 


class User{

	protected $pdo="";

	function __construct(){
		$this->pdo=DB::connection()->getPdo();
	}

	function get_random_string($length){
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    	$codeAlphabet.= "0123456789";
    	$token='';

		for($i=0;$i<$length;$i++){
			$min=0;
			$max=	strlen($codeAlphabet);
	        	$range = $max - $min;
	        if ($range < 0) return $min; // not so random...
	        $log = log($range, 2);
	        $bytes = (int) ($log / 8) + 1; // length in bytes
	        $bits = (int) $log + 1; // length in bits
	        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	        do {
	            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
	            $rnd = $rnd & $filter; // discard irrelevant bits
	        } while ($rnd >= $range);
	        
        	$token .= $codeAlphabet[$min + $rnd];
    	}
   		 return $token;
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
			$user_id=$this->pdo->lastInsertId();
			$random_string = $this->get_random_string(24);
		    $query=$this->pdo->prepare("INSERT INTO userconfirmation (user_id,confirmationstring) VALUES (:user_id,:confirmationstring)");
			$query->bindParam('user_id', $user_id);
			$query->bindParam('confirmationstring', $random_string);
			$query->execute();		
			$message=array();
			$message['randomstring']=$random_string;
			$message['user_id']=$user_id;
		} 
		catch (PDOException $e) {

		    $message=false;
		}
		
		return $message;
	}

	function confirm_user($confirmationstring,$user_id){
		$message=false;

	    $query=$this->pdo->prepare("SELECT * FROM userconfirmation WHERE user_id=:user_id");
		$query->bindParam('user_id', $user_id);
		$query->execute();			
		$row=$query->fetch();
		if($row['confirmationstring']==$confirmationstring){
		    $query=$this->pdo->prepare("UPDATE user SET confirmed=TRUE WHERE user_id=:user_id");
			$query->bindParam('user_id', $user_id);
			$query->execute();						
			$message=true;
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