<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('position_tag', function(Blueprint $table) {
			$table->increments('position_tag_id');

			$table->integer('position_id')->unsigned();
			$table->foreign('position_id')->references('position_id')->on('position');

			$table->integer('tag_id')->unsigned();
			$table->foreign('tag_id')->references('tag_id')->on('tag');

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
		Schema::drop('position_tag');
	}

}

?>