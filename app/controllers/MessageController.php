<?php

class MessageController extends Controller {

	/**
	 * Signs up the user for the site
	 *
	 * @return void
	 */
	
	protected function post_position_message(){
		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		
		//TO BE REPLACED BY THIS LAtER
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');	

//		$user_id=5;
		return	 $this->send_message($user_id,$input['receiver_id'], 'position', $input['message'],$input['position_id'],null);


	}
	protected function send_message($sender_id,$receiver_id, $message_type, $message,$table_id,$reference_message_id=null)
	{
		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		$query=$pdo->prepare("INSERT INTO message (sender_id,receiver_id,message_type,table_id,reference_message_id,message,created_at) 
				VALUES (:sender_id,:receiver_id,:message_type,:table_id,:reference_message_id,:message,NOW())");
		$query->bindParam('sender_id', $sender_id);
		$query->bindParam('receiver_id', $receiver_id);
		$query->bindParam('message_type', $message_type);
		$query->bindParam('table_id', $table_id);
		$query->bindParam('reference_message_id', $reference_message_id);
		$query->bindParam('message', $message);
		$query->execute();
		$message_id=$pdo->lastInsertId();

		if($reference_message_id==null){
			$query=$pdo->prepare("UPDATE message SET reference_message_id=:message_id1 WHERE message_id=:message_id");
			$query->bindParam('message_id', $message_id);
			$query->bindParam('message_id1', $message_id);
			$query->execute();
		}
		return "{'result':'ok','data':'".$message_id."'}";

	}

	protected function get_inbox(){
		$input=Input::all();		
		$user_id=Session::get('user_id');	
		$pdo=DB::connection()->getPdo();		
		$sql= "SELECT m1.*,m4.count, u.*
			FROM message m1 LEFT JOIN 
			(SELECT MAX(created_at) as timestamp , reference_message_id  
			FROM message GROUP BY reference_message_id) m2
			ON m1.message_id=m2.reference_message_id
			LEFT JOIN
			(SELECT COUNT(message_id) as count , reference_message_id  
			FROM message WHERE flag=0 GROUP BY reference_message_id ) m4
			ON m1.message_id=m4.reference_message_id ,
			user u 
			WHERE
			m1.message_id=m1.reference_message_id AND 
			((u.user_id=m1.sender_id AND u.user_id=:user_id) OR (u.user_id=m1.receiver_id AND u.user_id=:user_id1))
			ORDER BY timestamp DESC";

		$query=$pdo->prepare($sql);
		$query->bindParam('user_id',$user_id);
		$query->bindParam('user_id1',$user_id);
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			if($value['message_type']=='position'){
				$sql= "SELECT position_name,venture_name
				   FROM position p,venture v
				   WHERE (p.venture_id=v.venture_id) AND p.position_id=:position_id";
				$query2=$pdo->prepare($sql);
				$query2->bindParam('position_id',$value['table_id']);
				$query2->execute();	
				$row2=$query2->fetch();
				$row[$key]['subject']=$row2['position_name']." : ".$row2['venture_name'];
			}
			else{
				$array = explode('~', $row[$key]['message'], 2); //will break if ~ is used in title cancel
				$row[$key]['message']=$array[1];
				$row[$key]['subject']=$array[0];
			}
		}
		return json_encode($row);
	}

	protected function get_message_thread(){
		$input=Input::all();
		$user_id=Session::get('user_id');	
		$message_id=$input['message_id']; 	
		$pdo=DB::connection()->getPdo();
		$sql= "SELECT message.*,u.user_id,u.user_name 
			   FROM message, user u
			   WHERE reference_message_id=:message_id AND (sender_id=:user_id OR receiver_id=:user_id1)
			   AND user_id=sender_id
			   ORDER BY message.created_at";
		$query=$pdo->prepare($sql);
		$query->bindParam('user_id',$user_id);
		$query->bindParam('user_id1',$user_id);
		$query->bindParam('message_id',$message_id);		
		$query->execute();
		$data['thread']=($query->fetchAll());
		
		$sql= "SELECT * 
			   FROM message
			   WHERE reference_message_id=:message_id
			   ORDER BY created_at";
		$query=$pdo->prepare($sql);
		$query->bindParam('message_id',$message_id);		
		$query->execute();

		$data['data']=($query->fetch());
		if($data['data']['sender_id']==$user_id)
			$data['data']['receiver']=$data['data']['receiver_id'];
		else
			$data['data']['receiver']=$data['data']['sender_id'];
		
		return json_encode($data);
	}

	protected function flag_message(){
		$input=Input::all();
		$user_id=$input['message_id'];
	}

	protected function post_reply(){
		$input=Input::all();
		$user_id=Session::get('user_id');
		$receiver_id=$input['receiver_id'];
		$this->send_message($user_id,$receiver_id,$input['message_type'], $input['message'],$input['table_id'],$input['reference_message_id']);
	}

}
?>