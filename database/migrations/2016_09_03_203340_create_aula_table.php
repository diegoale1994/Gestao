<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aula', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('nombre',50);
			$table->string('cant_equipos',2);
			$table->string('cant_personas',2);
			$table->string('piso',1);
			
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
		Schema::drop('aula');
	}

}
