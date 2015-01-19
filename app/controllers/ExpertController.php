<?php

class ExpertController extends BaseController{


	public function get_expertise(){

		$pdo=DB::connection()->getPdo();		
		$query = $pdo->prepare("SELECT  experience.*,user.user_name FROM experience,user WHERE user.user_id=experience.user_id ORDER BY created_at DESC");
		$query->execute();
		$row=$query->fetchAll();
		foreach ($row as $key => $value) {
			$query = $pdo->prepare("SELECT  tag_name FROM experience_tag,tag WHERE experience_id=:experience_id AND experience_tag.tag_id=tag.tag_id ORDER BY experience_tag.created_at DESC");
			$query->bindParam(':experience_id', $value['experience_id']);
			$query->execute();
			$row[$key]['tags']=$query->fetchAll();			
		}

		return json_encode($row);
	}

}
?>