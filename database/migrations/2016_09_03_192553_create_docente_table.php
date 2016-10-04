<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('docente', function(Blueprint $table)
		{
			$table->integer('persona_id')->unsigned();	
			$table->primary('persona_id');
			$table->integer('codigo');
			$table->string('facebook',100);
			$table->string('twiter',100);
			$table->string('foto',255);
			$table->text('descripcion');
			$table->text('activo',1);
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
		Schema::drop('docente');
	}

}
