<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persona', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('programa_id')->unsigned();
			$table->string('nombre1',30);
			$table->string('nombre2',30)->nullable();
			$table->string('apellido1',30);
			$table->string('apellido2',30)->nullable();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('rol',1);
			$table->string('estado',1);
			$table->string('telefono',10);
			$table->string('cell_token',400);
			$table->rememberToken();
			$table->foreign('programa_id')->references('id')->on('programa');
			$table->timestamps();
		});
		DB::table('persona')->insert(
        array(
            'email' => 'mail@mail.com',
            'password' => bcrypt('letmein'),
            'programa_id' => 1,
            'rol' => 'M'
        )
    );
		DB::table('persona')->insert(
        array(
            'email' => 'diego.fc.1@hotmail.com',
            'password' => bcrypt('hangar18'),
            'programa_id' => 1,
            'rol' => 'M'
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
		Schema::drop('persona');
	}

}
