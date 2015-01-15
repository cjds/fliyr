<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperienceTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experience_tag', function(Blueprint $table) {
			$table->increments('experience_tag_id');

			$table->integer('experience_id')->unsigned();
			$table->foreign('experience_id')->references('experience_id')->on('experience');

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
		Schema::drop('experience_tag');
	}

}

?>