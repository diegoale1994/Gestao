<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clase', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('nombre',50);
			$table->string('grupo',10)->nullable();
			$table->string('creditos',1)->nullable();
			$table->string('semestre',2)->nullable();
			$table->string('cant_estudiantes',2);
			$table->text('requerimientos')->nullable();
			
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
		Schema::drop('clase');
	}

}
