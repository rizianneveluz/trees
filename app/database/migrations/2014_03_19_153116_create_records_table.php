<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->unique()->primary();

			$table->string('institution_storing', 255)->nullable();
			$table->string('phylum_name', 255);
			$table->string('class_name', 255);
			$table->string('order_name', 255);
			$table->string('family_name', 255);
			$table->string('subfamily_name', 255)->nullable();
			$table->string('genus_name', 255);
			$table->string('species_name', 255);
			$table->integer('sequence_id');
			$table->string('marker_code', 255);
			$table->string('genbank_accession', 255)->nullable();
			$table->text('nucleotides');
			$table->string('nucleotides_last_updated', 255)->nullable();
			$table->string('sequence_last_updated', 255)->nullable();
			$table->text('notes')->nullable();
			$table->integer('user_id')->unsigned()->nullable()->default(0);
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('records');
	}

}
