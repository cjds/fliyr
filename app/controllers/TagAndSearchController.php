<?php


class TagAndSearchController extends Controller{
	
	public function search_experience(){
		$input=Input::all();
		$searchterm=$input['searchterm'];
		$tagArray = preg_match_all('/(\s*#[A-z]*\s*)/', $searchterm,$matches);
		$tagArray=$matches;
		$search=preg_replace('/(\s*#[A-z]*\s*)/',' ', $searchterm);
		$search=trim($search);
		
	}

}
?>