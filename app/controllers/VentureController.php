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
		$creator_id=$input['user_id'];
		$venture_name=$input['venture_name'];
		$venture_tags=explode(',', $input['venture_tags']);
		$venture_description=$input['venture_description'];
		$pdo=DB::connection()->getPdo();

		$sql="INSERT INTO venture (venture_name,venture_description,creator_id,created_at) VALUES ('".$venture_name."','".$venture_description."','".$creator_id."',NOW())";
		$pdo->exec( $sql );
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

		return 'ok';
	}

	protected function get_ventures(){
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}
		return  json_encode($row);
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
			$sql="INSERT INTO position_tag (position_id,tag_id) VALUES ('".$position_id."','".$tag_id."')";
			$pdo->exec( $sql );
		}

		return 'ok';
	}


	
}
?>