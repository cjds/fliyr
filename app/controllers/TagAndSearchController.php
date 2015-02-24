<?php


class TagAndSearchController extends Controller{
	
	public function search_experience(){
		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		$searchterm=$input['searchterm'];
		$tagArray = preg_match_all('/(\s*#([A-z]|[0-9])*\s*)/', $searchterm,$matches);
		$tagArray=$matches[0];
		$search=preg_replace('/(\s*#[A-z]*\s*)/',' ', $searchterm);
		
		$search=trim($search);
		$searchcount=count($tagArray);
		
		foreach ($tagArray as $key => $value) {
			$tagArray[$key]=$pdo->quote(trim(substr($tagArray[$key], 1)));
		}
		$tagArrayString=implode(",",$tagArray);
		echo ($tagArrayString);

		$query = $pdo->prepare("SELECT  et.experience_id
								FROM experience_tag et,tag t
								WHERE tag_name IN (".$tagArrayString.") AND t.tag_id=et.tag_id" ) ;

		// SELECT experience e FROM experience_tag et,experience e WHERE etx
		$query->execute();
		$row=$query->fetchAll();
		print_r($row);
	}

}
?>