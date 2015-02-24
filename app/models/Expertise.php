<?php 

class Expertise{

	protected $pdo="";

	function __construct(){
		$this->pdo=DB::connection()->getPdo();
	}

	//returns array of expertise cards 
	public function get_all_expertise(){
		$query = $this->pdo->prepare("SELECT  experience.*,user.user_name FROM experience,user WHERE user.user_id=experience.user_id ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();

		foreach ($row as $key => $value) {
			$name=explode(';', $row[$key]['user_name']);
			$row[$key]['user_name']=$name[0];
			$query = $this->pdo->prepare("SELECT  tag_name FROM experience_tag,tag WHERE experience_id=:experience_id AND experience_tag.tag_id=tag.tag_id ORDER BY experience_tag.created_at DESC");
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
		return $row;
	}

	public function get_expertise_with_ids($ids){

	}

	private function generate_expertise_query($experience_ids=NULL,$search=NULL){

		if($experience_ids!=NULL){

		}
		if($search!=NULL){

		}
		else{
			$val="SELECT  experience.*,user.user_name FROM experience,user WHERE user.user_id=experience.user_id ORDER BY created_at DESC";
		}

		$query=$this->pdo->prepare($val);

		return $query;
	}

}

?>