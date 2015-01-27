<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$pdo=DB::connection()->getPdo();		
		$tagarray=array('Technical','Front End Development','Back End Development','Application Development','iOS Development','Android Development','Database Design','Coding','Information Architecture','Data Mining','Security','S.E.O.','Hardware Design','Product Engineer','WordPress','Creative','Graphic Design','Photographer','UX/UI','General Design','Industral Design','Website Design','Branding','Ideation','Content Management','Copywriting','Technical Writing','Video Editing','Advertising','Product Design','Business','Networking','General Marketing','Social Media Marketing','Accounting','Legal','Communication','Leadership','Negotiation','Business Development','Project Management','Fundraising','Content Management','Financial Management','Multilingual','Presenting','Operations','Customer Service');
		foreach($tagarray as $tag){
			DB::raw("INSERT INTO tag (tag_name,tag_description,official) VALUES (".$tag.",'',true)");
		}


	}

	function generateRandomString($length = 6) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}	



}
