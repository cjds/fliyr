<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('user_id');
			$table->string('user_name');
			$table->string('user_email');
			$table->string('user_password');
			$table->boolean('confirmed')->default(false);
			$table->boolean('banned')->default(false);			
			$table->integer('admin');			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}

?>