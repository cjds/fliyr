<?php 

class Ventures{

	protected $pdo="";

	function __construct(){
		$pdo=DB::connection()->getPdo();		
	}

	public function get_all(){
		
		$session = new SessionModel;
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture WHERE deleted_at is NULL  ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			//check for owner
			if($value['creator_id']==$session->get_user_id()){
				$row[$key]['creator']=true;
			}
			else
				$row[$key]['creator']=false;	
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id AND (deleted_at IS NULL) ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			foreach ($row[$key]['positions'] as $key2 => $postion) {
				$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
				$query->bindParam(':position_id', $row[$key]['positions'][$key2]['position_id']);
				$query->execute();
				$row[$key]['positions'][$key2]['tags']=$query->fetchAll();
				if($row[$key]['creator_id']==$session->get_user_id()){
					$row[$key]['positions'][$key2]['creator']=true;
				}
				else{
					$row[$key]['positions'][$key2]['creator']=false;
				}
			}
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			


		}

		return  json_encode($row);
	}	

	public function get($id){
		$session = new SessionModel;
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture WHERE venture_id=:venture_id ORDER BY updated_at DESC");
		$query->bindParam('venture_id',$id);
		$query->execute();
		$row=$query->fetch();
		//check for owner
		if($row['creator_id']==$session->get_user_id()){
			$row['creator']=true;
		}
		else
			$row['creator']=false;	
		$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id AND (deleted_at IS NULL) ORDER BY created_at DESC");
		$query->bindParam(':venture_id', $row['venture_id']);
		$query->execute();
		$row['positions']=$query->fetchAll();
		foreach ($row['positions'] as $key2 => $postion) {
			$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
			$query->bindParam(':position_id', $row['positions'][$key2]['position_id']);
			$query->execute();
			$row['positions'][$key2]['tags']=$query->fetchAll();
		}
		$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
		$query->bindParam(':venture_id', $value['venture_id']);
		$query->execute();
		$row['tags']=$query->fetchAll();			
	
		return  json_encode($row);		
	}

	public function delete($id){
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("UPDATE venture SET deleted_at=NOW() WHERE venture_id=:venture_id");
		$query->bindParam('venture_id',$id);
		$query->execute();
		return true;
	}

	public function get_mine($user_id){
		
		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  * FROM venture WHERE creator_id=:user_id AND deleted_at is NULL ORDER BY created_at DESC");
		$query->bindParam('user_id',$user_id);
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  * FROM position WHERE venture_id=:venture_id AND deleted_at is NULL ORDER BY created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['positions']=$query->fetchAll();
			foreach ($row[$key]['positions'] as $key2 => $postion) {
				$query = $pdo->prepare("SELECT tag_name FROM position_tag,tag WHERE position_id=:position_id AND position_tag.tag_id=tag.tag_id ORDER BY position_tag.created_at DESC");
				$query->bindParam(':position_id', $row[$key]['positions'][$key2]['position_id']);
				$query->execute();
				$row[$key]['positions'][$key2]['tags']=$query->fetchAll();
				$row[$key]['positions'][$key2]['creator']=true;	
			}
			$query = $pdo->prepare("SELECT  tag_name FROM venture_tag,tag WHERE venture_id=:venture_id AND venture_tag.tag_id=tag.tag_id ORDER BY venture_tag.created_at DESC");
			$query->bindParam(':venture_id', $value['venture_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();		
			$row[$key]['creator']=true;	
		}
		return  json_encode($row);
	}	

	//this function generates a query for the ventures
	//venture_ids is a string of ventures that can be added
	//search is a string that is searched in the description and the name
	//TODO : need to search by positions
	//
	public function generate_ventures_query($venture_ids=NULL,$search=NULL,$user_ids=NULL){
		$val="SELECT  * FROM venture v,user u WHERE v.deleted_at is NULL AND u.user_id=v.creator_id";
		$data=array();
		if($venture_ids!=NULL){
			$val.=" AND (experience.experience_id IN (".$experience_ids.")) ";
		}
		if($user_ids!=NULL){
			$val.=" AND (user.user_id IN (".$user_ids.")) ";
		}
		if($search!=NULL){
			$val.=" AND (experience.description LIKE :search1 OR user.user_name LIKE :search2) ";
		//	$data[':search1']=$search;
			$data[':search1']='%'.$search.'%';
			$data[':search2']='%'.$search.'%';
		}

		$query=$this->pdo->prepare($val);
		
		if(!$query->execute($data)){

			return 	print_r($query->errorInfo());
		}

		return $query;

	}


}

?>