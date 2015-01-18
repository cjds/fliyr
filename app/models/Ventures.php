<?php 

class Ventures{

	public function get_all(){
		
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			foreach ($row[$key]['positions'] as $key2 => $postion) {
				$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
				$query->bindParam(':position_id', $row[$key]['positions'][$key2]['position_id']);
				$query->execute();
				$row[$key]['positions'][$key2]['tags']=$query->fetchAll();
			}
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}
		return  json_encode($row);
	}	

	public function get_mine($user_id){
		
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture WHERE creator_id=:user_id ORDER BY created_at DESC");
		$query->bindParam('user_id',$user_id);
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			foreach ($row[$key]['positions'] as $key2 => $postion) {
				$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
				$query->bindParam(':position_id', $row[$key]['positions'][$key2]['position_id']);
				$query->execute();
				$row[$key]['positions'][$key2]['tags']=$query->fetchAll();
			}
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}
		return  json_encode($row);
	}	

}

?>