<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentureTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venture_tag', function(Blueprint $table) {
			$table->increments('venture_tag_id');

			$table->integer('venture_id')->unsigned();
			$table->foreign('venture_id')->references('venture_id')->on('venture');

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
		Schema::drop('venture_tag');
	}

}

?>