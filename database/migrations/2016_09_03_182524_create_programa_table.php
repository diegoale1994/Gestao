<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programa', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 50);
			$table->timestamps();
		});
		DB::table('programa')->insert(
        array(
            'nombre' => 'Ingenieria de sistemas'
            )
        );
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('programa');
	}

}
