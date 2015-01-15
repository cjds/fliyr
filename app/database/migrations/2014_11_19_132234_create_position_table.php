<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('position', function(Blueprint $table) {
			$table->increments('position_id');
			$table->integer('venture_id')->unsigned();
			$table->foreign('venture_id')->references('venture_id')->on('venture');
			$table->string('position_name');
			$table->text('position_description');
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
		Schema::drop('position');
	}

}

?>