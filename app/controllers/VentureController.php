<?php

class VentureController extends Controller {

	/**
	 * Signs up the user for the site
	 *
	 * @return void
	 */
	protected function add_venture()
	{
		$input=Input::all();
		//input
		$user_name=Session::get('user_name');
		$creator_id=Session::get('user_id');

		$venture_name=$input['name'];
		if(isset($input['tags']))
			$venture_tags=explode(',', $input['tags']);
		else
			$venture_tags=array();

		$venture_description=$input['description'];

		if(isset($input['positions']))
			$venture_positions=$input['positions'];
		else
			$venture_positions=array();
		$pdo=DB::connection()->getPdo();

		$sql=$pdo->prepare("INSERT INTO venture (venture_name,venture_description,creator_id,created_at) VALUES (:venture_name,:venture_description,:creator_id,NOW())");
		$sql->bindParam(':venture_name', $venture_name);
		$sql->bindParam(':venture_description', $venture_description);
		$sql->bindParam(':creator_id', $creator_id);
		$sql->execute();
		$venture_id=$pdo->lastInsertId();

		foreach ($venture_tags as $tag) {
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
			$sql="INSERT INTO venture_tag (venture_id,tag_id) VALUES ('".$venture_id."','".$tag_id."')";
			$pdo->exec( $sql );
		}

		foreach ($venture_positions as $position) {
			$query = $pdo->prepare("INSERT INTO position (position_name,position_description,venture_id,created_at) VALUES (:position_name,:position_description,:venture_id,NOW())");
			$query->bindParam(':position_name', $position['name']);
			$query->bindParam(':position_description', $position['description']);
			$query->bindParam(':venture_id', $venture_id);
			$query->execute();
			$position_id=$pdo->lastInsertId();
			
			foreach (explode(',',$position['tags']) as $tag) {
				$tag=substr($tag, 0, -1);
				$query = $pdo->prepare("SELECT  tag_id FROM tag WHERE tag_name = :tag");
				$query->bindParam(':tag', $tag);
				$query->execute();
				$row=$query->fetchAll();
				$tag_id=-1;
				if(!$row){
					$query = $pdo->prepare("INSERT INTO tag (tag_name,tag_description) VALUES (:tag,'')");
					$query->bindParam(':tag', $tag);
					$query->execute();
					$tag_id=$pdo->lastInsertId();	
				}
				else{
					$tag_id=$row[0]['tag_id'];
				}
				$query = $pdo->prepare("INSERT INTO position_tag (position_id,tag_id) VALUES (:position_id,:tag_id)");
				$query->bindParam(':position_id', $position_id);
				$query->bindParam(':tag_id', $tag_id);
				$query->execute();
				}
		}

		return 'ok';
	}

	protected function get_ventures(){
		$ventures=new Ventures;
		return $ventures->get_all();

	}

	protected function get_my_ventures(){
		$session =new SessionModel;
		$redirection=$session->handle_redirection();
		
		if($redirection!=null)
			return $redirection;
		
		$ventures=new Ventures;

		return $ventures->get_mine($session->get_user_id());

	}

	protected function get_position_data(){
		$pdo=DB::connection()->getPdo();
		$input=Input::all();
		$position_id=$input['position_id'];
		$sql="SELECT u.*,v.*,p.* FROM position p,user u,venture v WHERE p.position_id=:position_id AND v.venture_id=p.venture_id AND v.creator_id=u.user_id" ;
		$query=$pdo->prepare($sql);
		$query->bindParam('position_id',$position_id);
		$query->execute();
		$row = $query->fetch();
		return json_encode($row);
	}

	protected function add_position()
	{
		$input=Input::all();
		//input
		$venture_id=$input['venture_id'];
		$position_name=$input['position_name'];
		$position_tags=explode(',', $input['position_tags']);
		$position_description=$input['position_description'];
		$pdo=DB::connection()->getPdo();

		$sql="INSERT INTO position (position_name,position_description,venture_id,created_at) VALUES ('".$position_name."','".$position_description."','".$venture_id."',NOW())";
		$pdo->exec( $sql );
		$position_id=$pdo->lastInsertId();

		foreach ($position_tags as $tag) {
			$query = $pdo->prepare("SELECT  tag_id FROM tag WHERE tag_name = :tag");
			$query->bindParam('tag', $tag);
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
			$sql="INSERT INTO position_tag (position_id,tag_id) VALUES ('".$position_id."','".$tag_id."')";
			$pdo->exec( $sql );
		}

		return 'ok';
	}


	
}
?>