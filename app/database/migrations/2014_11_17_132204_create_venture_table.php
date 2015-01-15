<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venture', function(Blueprint $table) {
			$table->increments('venture_id');
			$table->string('venture_name');
			$table->string('venture_description');

			$table->integer('creator_id')->unsigned();
			$table->foreign('creator_id')->references('user_id')->on('user');

			$table->boolean('confirmed')->default(false);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venture');
	}

}

?>