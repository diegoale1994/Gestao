<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseAulaHorarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clase_aula_horario', function(Blueprint $table)
		{
			$table->string('id_clase');
			$table->string('id_aula')->nullable();
			$table->string('hora_inicio',2);
			$table->string('hora_final',2);
			$table->date('fecha')->nullable();
			$table->primary(['id_clase', 'fecha']);
			$table->foreign('id_clase')->references('id')->on('clase')->onDelete('cascade');;
			$table->text('observaciones')->nullable();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clase_aula_horario');
	}

}
