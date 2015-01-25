<?php

class MessageController extends Controller {

	/**
	 * Signs up the user for the site
	 *
	 * @return void
	 */
	
	protected function post_position_message(){

		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;

		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');	

		$pdo=DB::connection()->getPdo();
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		$user_id=$session->get_user_id();

		$sql= "SELECT * FROM position p,venture v WHERE position_id=:position_id AND v.venture_id=p.venture_id ";
		$query=$pdo->prepare($sql);
		$query->bindParam('position_id',$input['position_id']);
		$query->execute();
		$row=$query->fetch();
		$message=$row['venture_name'].' - '. $row['position_name'].';'.$input['message'];		

		return	 $this->send_message($user_id,$input['receiver_id'], 'position', $message,$input['position_id'],null);
	}


	protected function post_experience_message(){

		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
			$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		
		$user_name=Session::get('user_name');
		$user_id=Session::get('user_id');	

		$message=$input['subject'].';'.$input['message'];

		return	 $this->send_message($user_id,$input['user_id'], 'experience',$message,$input['user_id'],null);
	}


	protected function get_notifications(){

		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return 0;

		$user_id=Session::get('user_id');
		$pdo=DB::connection()->getPdo();		
		$query=$pdo->prepare("SELECT COUNT(message_id) as count , reference_message_id  
			FROM message WHERE flag=0 AND receiver_id=:user_id GROUP BY reference_message_id ");
		$query->bindParam(':user_id',$user_id);

		$query->execute();
		$row=$query->fetch();

		return $row['count'];

	}


	protected function send_message($sender_id,$receiver_id, $message_type, $message,$table_id,$reference_message_id=null)
	{
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
		$pdo=DB::connection()->getPdo();		
		$input=Input::all();

		$subject='';

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
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
		$input=Input::all();		
		$user_id=Session::get('user_id');	
		$pdo=DB::connection()->getPdo();		
		$sql= "SELECT m1.sender_id,m1.receiver_id,m1.message as ref_message, m1.message_id AS message_id,m1.message_type,m1.table_id,m2.message,m2.timestamp,m4.count, u1.user_name as sender_name,u2.user_name as receiver_name
			FROM message m1 LEFT JOIN 
			(SELECT timestamp,message,mo.message_id, mm.reference_message_id
			FROM (SELECT MAX(created_at) as timestamp, reference_message_id  
			FROM message  GROUP BY reference_message_id) mm
            JOIN message mo ON mo.created_at=mm.timestamp) m2
			ON m1.message_id=m2.reference_message_id
			LEFT JOIN
			(SELECT COUNT(message_id) as count , reference_message_id  
			FROM message WHERE flag=0 AND receiver_id=:user_id GROUP BY reference_message_id ) m4
			ON m1.message_id=m4.reference_message_id ,
			user u1,user u2 
			WHERE
			m1.message_id=m1.reference_message_id AND 
			(m1.sender_id=:user_id1 OR m1.receiver_id=:user_id2) AND
			(u1.user_id=m1.sender_id) AND (u2.user_id=m1.receiver_id)
			ORDER BY timestamp DESC";

		$query=$pdo->prepare($sql);
		$query->bindParam('user_id',$user_id);
		$query->bindParam('user_id1',$user_id);
		$query->bindParam('user_id2',$user_id);
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {

			
			if($row[$key]['sender_id']==$user_id){
				$name=explode(';',$row[$key]['receiver_name']);
				$row[$key]['user_name']=$name[0];
			}
			else{
				$name=explode(';',$row[$key]['sender_name']);
				$row[$key]['user_name']=$name[0];
			}
				$array = explode(';', $row[$key]['ref_message']); //will break if ~ is used in title cancel
				$message='';
				//for($i=1;$i<count($array);$i++)
				//	$message.=$array[$i];
				if(strlen($row[$key]['message'])>80)
					$row[$key]['message']=substr($row[$key]['message'],0,80).'...';

				$row[$key]['subject']=$array[0];
			
		}
		return json_encode($row);
	}

	protected function get_message_thread(){
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
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
		foreach ($data['thread'] as $key => $value) {
			if($value['user_id']==$user_id)
				$data['thread'][$key]['user_name']='me';
				$messagedata=explode(';',$data['thread'][$key]['message']);
				$data['thread'][$key]['message']='';
				if(count($messagedata)!=1){
					for($i=1;$i<count($messagedata);$i++)
						$data['thread'][$key]['message'].=$messagedata[$i];
					
				}
				else
					$data['thread'][$key]['message']=$messagedata[0];
		}

		$sql= "SELECT * 
			   FROM message
			   WHERE reference_message_id=:message_id
			   ORDER BY created_at";
		$query=$pdo->prepare($sql);
		$query->bindParam('message_id',$message_id);		
		$query->execute();

		$data['data']=($query->fetch());
		$messagedata=explode(';',$data['data']['message']);
			$data['data']['message']=$messagedata[0];


		if($data['data']['sender_id']==$user_id)
			$data['data']['receiver']=$data['data']['receiver_id'];
		else
			$data['data']['receiver']=$data['data']['sender_id'];
		
		$this->flag_message($message_id);
		return json_encode($data);
	}

	protected function flag_message($message_id){
		$pdo=DB::connection()->getPdo();
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		$user_id=$session->get_user_id();
		if($redirection!=null)
			return $redirection;

		$sql= "UPDATE message SET flag =1 WHERE reference_message_id=:message_id AND (sender_id!=:user_id)";
		$query=$pdo->prepare($sql);
		$query->bindParam('message_id',$message_id);
		$query->bindParam('user_id',$user_id);
		$query->execute();

	}

	protected function post_reply(){
		$session =new SessionModel;
		$redirection=$session->handle_json_redirection();
		
		if($redirection!=null)
			return $redirection;
		$input=Input::all();
		$user_id=Session::get('user_id');
		$receiver_id=$input['receiver_id'];
		$this->send_message($user_id,$receiver_id,$input['message_type'], $input['message'],$input['table_id'],$input['reference_message_id']);
	}

}
?>