<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collectors', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name', 255);
			//$table->integer('record_id')->unsigned()->default(0);
			//$table->foreign('record_id')->references('id')->on('records')->onUpdate('cascade')->onDelete('cascade');
			
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
		Schema::drop('collectors');
	}

}
