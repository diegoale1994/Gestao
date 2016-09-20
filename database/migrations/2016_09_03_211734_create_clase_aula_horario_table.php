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
		$i=0;
 $date = '2016-09-19';
 $end_date = '2016-11-30';
 
 while (strtotime($date) <= strtotime($end_date)) {
 	for ($j=7; $j <20 ; $j++) { 
 		DB::table('clase_aula_horario')->insert(
        array(
            'id_clase' => 'CLA'.$i,
            'hora_inicio'=> $j,
            'hora_final' => $j+2,
            'fecha' => $date
        )
    );
 		if ($i>198) {
 			$i=0;
 		}
 		$i++;
 	}
      $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
 }
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
