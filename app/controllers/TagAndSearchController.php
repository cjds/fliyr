<?php


class TagAndSearchController extends Controller{
	
	public function search_experience(){
		$input=Input::all();
		$searchterm=$input['searchterm'];
		$tagArray = preg_match_all('/(\s*#[A-z]*\s*)/', $searchterm,$matches);
		$tagArray=$matches;
		$search=preg_replace('/(\s*#[A-z]*\s*)/',' ', $searchterm);
		$search=trim($search);
		$query = $pdo->prepare("SELECT  tag_id FROM experience,experience_tag,tag WHERE tag_name = :tag");

		// SELECT experience e FROM experience_tag et,experience e WHERE etx
		$query->bindParam(':tag', $tag);
		$query->execute();
		$row=$query->fetchAll();

	}

}
?>