<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experience', function(Blueprint $table) {
			$table->increments('experience_id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('user_id')->on('user');
			$table->boolean('experience_added_manually')->default(false);
			$table->text('description');
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
		Schema::drop('experience');
	}

}

?>