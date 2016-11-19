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
			$table->string('nombre',50)->unique();
			$table->string('cant_equipos',2);
			$table->string('cant_personas',2);
			$table->string('piso',1);
			
			$table->timestamps();
		});

	DB::table('aula')->insert(
        array(
            'id' => '1',
            'nombre' => 'Sala 01',
            'cant_equipos' => 19,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '2',
            'nombre' => 'Sala 02',
            'cant_equipos' => 18,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '3',
            'nombre' => 'Sala 03',
            'cant_equipos' => 20,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '4',
            'nombre' => 'Sala 04',
            'cant_equipos' => 13,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '5',
            'nombre' => 'Sala 05',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '6',
            'nombre' => 'Sala 06',
            'cant_equipos' => 29,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '7',
            'nombre' => 'Sala 07',
            'cant_equipos' => 18,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '8',
            'nombre' => 'Sala 08',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '9',
            'nombre' => 'Sala 09',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => '10',
            'nombre' => 'Sala 10',
            'cant_equipos' => 18,
            'cant_personas' => 20,
            'piso' => '1'
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
		Schema::drop('aula');
	}

}
