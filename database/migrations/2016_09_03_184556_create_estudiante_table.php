<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estudiante', function(Blueprint $table)
		{
			$table->integer('persona_id')->unsigned();
			$table->primary('persona_id');
			$table->integer('codigo');
			$table->integer('semestre');
			$table->foreign('persona_id')->references('id')->on('persona');
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
		Schema::drop('estudiante');
	}

}
