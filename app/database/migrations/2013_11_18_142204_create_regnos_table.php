<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegnosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regnos', function(Blueprint $table) {
			$table->increments('reg_id');
			$table->string('reg_string');
			$table->boolean('used')->default(false);
			$table->string('user_email')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regnos');
	}

}

?>