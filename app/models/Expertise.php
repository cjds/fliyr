<?php 

class Expertise{

	protected $pdo="";

	function __construct(){
		$this->pdo=DB::connection()->getPdo();
	}

	//returns array of expertise cards 
	public function get_all_expertise(){
		$rows=$this->generate_expertise_query()->fetchAll();
		$this->generate_more_info($rows);
		return $rows;
	}

	public function get_my_expertise(){
		$session =new SessionModel;
		$user_id=$session->get_user_id();
		if($user_id==NULL)
			return false;
		$rows=$this->generate_expertise_query(null,null,$user_id)->fetchAll();
		
		$this->generate_more_info($rows);
		return $rows;
	}

	//takes in the search and outputs the cards which match the search
	//The search is a string and all tags have the # key preceding the string
	public function get_expertise_with_tags($searchterm){

		//take all the tags out of the search
		$tagArray = preg_match_all('/(\s*#([A-z]|[0-9])*\s*)/', $searchterm,$matches);
		$tagArray=$matches[0];
		//get the search itself
		$search=preg_replace('/(\s*#[A-z]*\s*)/',' ', $searchterm);
		
		$search=trim($search);
		$tagcount=count($tagArray);
		//if there are tags
		if($tagcount>1){
			foreach ($tagArray as $key => $value) {
				$tagArray[$key]=$this->pdo->quote(trim(substr($tagArray[$key], 1)));
			}
			$tagArrayString=implode(",",$tagArray);
			//query to get all the experience IDs
			$query = $this->pdo->prepare("SELECT  et.experience_id
									FROM experience_tag et,tag t
									WHERE tag_name IN (".$tagArrayString.") AND t.tag_id=et.tag_id
									GROUP BY et.experience_id HAVING COUNT(DISTINCT tag_name)=".$tagcount) ;

			$query->execute();
			$experience_id_row=$query->fetchAll();
			//put all the experience ids in an array
			$experience_ids=array();
			foreach ($experience_id_row as $experience_id) {
				$experience_ids[]=$experience_id['experience_id'];
			}
		}
		else{
			//there are no tags only work by search
			$experience_ids=null;
		}

		//get all corresponding expertise cards
		$experience_ids=implode(",",$experience_ids);
		$rows=$this->generate_expertise_query($experience_ids,$search)->fetchAll();
		$this->generate_more_info($rows);
		return $rows;
	}

	//get some of the experise specified by the ids
	public function get_expertise_with_ids($experience_ids){
		$experience_ids=implode(",",$experience_ids);
		$rows=$this->generate_expertise_query($experience_ids)->fetchAll();
		$rows=array_merge_recursive ($rows,$this->generate_more_info($rows));
		return $rows;
	}

	//this function generates a query for the experience 
	//experience_ids are a string of the ids of the experience
	//search is a string that is searched in the description and the name
	private function generate_expertise_query($experience_ids=NULL,$search=NULL,$user_ids=NULL){
		$val="SELECT * FROM experience,user WHERE user.user_id=experience.user_id ";
		$data=array();
		if($experience_ids!=NULL){
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

	//this function generates more info about the tags and the creator of the expertise
	//if we ever want more data about each one of the expertise this is where to put it
	//added with array_merge_reursive
	private function generate_more_info(&$row){
		$session=new SessionModel();
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

}

?>