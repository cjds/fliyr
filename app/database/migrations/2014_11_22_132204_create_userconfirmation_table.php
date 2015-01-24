<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserConfirmationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userconfirmation', function(Blueprint $table) {
			$table->increments('user_id');
			$table->foreign('user_id')->references('user_id')->on('user');
			$table->string('confirmationstring');
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
		Schema::drop('userconfirmation');
	}

}

?>