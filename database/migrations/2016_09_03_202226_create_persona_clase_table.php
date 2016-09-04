<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaClaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persona_clase', function(Blueprint $table)
		{
			$table->integer('id_persona')->unsigned();
			$table->string('id_clase');
			$table->primary(['id_persona', 'id_clase']);
			$table->foreign('id_persona')->references('id')->on('persona');
			$table->foreign('id_clase')->references('id')->on('clase');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('persona_clase');
	}

}
