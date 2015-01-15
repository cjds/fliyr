<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message', function(Blueprint $table) {
			$table->increments('message_id');

			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('user_id')->on('user');

			$table->integer('position_id')->unsigned();
			$table->foreign('position_id')->references('position_id')->on('position');
			
			$table->string('message_type');
			$table->text('message');
			$table->boolean('flag')->default(false);
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
		Schema::drop('message');
	}

}

?>