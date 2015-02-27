<?php


class TagAndSearchController extends Controller{
	
	public function search_experience(){
		$input=Input::all();
		$expertise=new Expertise();
		print_r($expertise->get_expertise_with_tags($input['searchterm']));
	}


}
?>