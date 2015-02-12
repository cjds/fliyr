<?php


class TagAndSearchController extends Controller{
	
	public function search_experience(){
		$pdo=DB::connection()->getPdo();		
		$input=Input::all();
		$searchterm=$input['searchterm'];
		$tagArray = preg_match_all('/(\s*#[A-z]*\s*)/', $searchterm,$matches);
		$tagArray=$matches;
		$search=preg_replace('/(\s*#[A-z]*\s*)/',' ', $searchterm);
		$search=trim($search);
		$query = $pdo->prepare("SELECT  tag_id 
								FROM experience_tag
								WHERE tag_id IN (SELECT * FROM experience_tag GROUP BY experience_id))");

		// SELECT experience e FROM experience_tag et,experience e WHERE etx
		$query->bindParam(':tag', $tag);
		$query->execute();
		$row=$query->fetchAll();

	}
}
?>