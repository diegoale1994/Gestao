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

	DB::table('aula')->insert(
        array(
            'id' => 'AUL001',
            'nombre' => 'Sala 01',
            'cant_equipos' => 19,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL002',
            'nombre' => 'Sala 02',
            'cant_equipos' => 18,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL003',
            'nombre' => 'Sala 03',
            'cant_equipos' => 20,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL004',
            'nombre' => 'Sala 04',
            'cant_equipos' => 13,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL005',
            'nombre' => 'Sala 05',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '2'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL006',
            'nombre' => 'Sala 06',
            'cant_equipos' => 29,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL007',
            'nombre' => 'Sala 07',
            'cant_equipos' => 18,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL008',
            'nombre' => 'Sala 08',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL009',
            'nombre' => 'Sala 09',
            'cant_equipos' => 17,
            'cant_personas' => 20,
            'piso' => '1'
        )
    );
	DB::table('aula')->insert(
        array(
            'id' => 'AUL010',
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
