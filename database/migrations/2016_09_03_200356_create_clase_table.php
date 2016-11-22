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
			$table->string('id_docente')->nullable();
			$table->string('semestre',2)->nullable();
			$table->string('cant_estudiantes',2);
			$table->text('requerimientos')->nullable();
			
			$table->timestamps();
		});

		DB::table('clase')->insert(
        array(
            'id' => 'FDPELECT205211116',
            'nombre' => 'Fundamentos de programacion',
            'grupo' => 'ELECT205',
            'creditos' => 3,
            'cant_estudiantes' => 19,
            'semestre' => 2,
        )
    );

		DB::table('clase')->insert(
        array(
            'id' => 'BDD2SIS702211116',
            'nombre' => 'Bases de datos 2',
            'grupo' => 'SIS702',
            'creditos' => 3,
            'cant_estudiantes' => 6,
            'semestre' => 7,
        )
    );

    	DB::table('clase')->insert(
        array(
            'id' => 'MA3ELEC301211116',
            'nombre' => 'Matematicas 3',
            'grupo' => 'ELEC301',
            'creditos' => 3,
            'cant_estudiantes' => 15,
            'semestre' => 3,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'EP3ELEC1001211116',
            'nombre' => 'Electiva profesional 3',
            'grupo' => 'ELEC1001',
            'creditos' => 3,
            'cant_estudiantes' => 16,
            'semestre' => 10,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'ADSSIS901211116',
            'nombre' => 'Auditoria de sistemas',
            'grupo' => 'SIS901',
            'creditos' => 4,
            'cant_estudiantes' => 5,
            'semestre' => 9,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CATCART401211116',
            'nombre' => 'Cartografia tematica',
            'grupo' => 'CART401',
            'creditos' => 4,
            'cant_estudiantes' => 18,
            'semestre' => 4,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'EBI2SIS801211116',
            'nombre' => 'Electiva basica de ingenieria 2',
            'grupo' => 'SIS801',
            'creditos' => 3,
            'cant_estudiantes' => 14,
            'semestre' => 8,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'SIELEBEC501211116',
            'nombre' => 'Sistemas espaciales',
            'grupo' => 'LEBEC501',
            'creditos' => 2,
            'cant_estudiantes' => 16,
            'semestre' => 5,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CABCART301211116',
            'nombre' => 'Cartografia basica',
            'grupo' => 'CART301',
            'creditos' => 3,
            'cant_estudiantes' => 10,
            'semestre' => 3,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CO3CONT301D211116',
            'nombre' => 'Contabilidad 3',
            'grupo' => 'CONT301D',
            'creditos' => 3,
            'cant_estudiantes' => 17,
            'semestre' => 3,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CO3CONT301N211116',
            'nombre' => 'Contabilidad 3',
            'grupo' => 'CONT301N',
            'creditos' => 3,
            'cant_estudiantes' => 10,
            'semestre' => 3,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CDD2SIS701211116',
            'nombre' => 'Comunicacion de datos 2',
            'grupo' => 'SIS701',
            'creditos' => 4,
            'cant_estudiantes' => 10,
            'semestre' => 7,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CO2CONT201D211116',
            'nombre' => 'Contabilidad 2',
            'grupo' => 'CONT201D',
            'creditos' => 3,
            'cant_estudiantes' => 18,
            'semestre' => 2,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'CO2CONT202N211116',
            'nombre' => 'Contabilidad 2',
            'grupo' => 'CONT202N',
            'creditos' => 3,
            'cant_estudiantes' => 11,
            'semestre' => 2,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'EP1SIS901211116',
            'nombre' => 'Electiva profesional 1',
            'grupo' => 'SIS901',
            'creditos' => 3,
            'cant_estudiantes' => 10,
            'semestre' => 9,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'EVADOFIVIRTUAL211116',
            'nombre' => 'Educacion virtual a distancia',
            'grupo' => 'OFIVIRTUAL',
            'cant_estudiantes' => 10,
            'semestre' => 1,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'FYEDPSIS801211116',
            'nombre' => 'Formulacion y evaluacion de proyectos',
            'grupo' => 'SIS801',
            'creditos' => 2,
            'cant_estudiantes' => 6,
            'semestre' => 8,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'EL3CONT801N211116',
            'nombre' => 'Electiva 3',
            'grupo' => 'CONT801N',
            'creditos' => 2,
            'cant_estudiantes' => 26,
            'semestre' => 8,
        )
    );	
    	DB::table('clase')->insert(
        array(
            'id' => 'PSWBNNN211116',
            'nombre' => 'Proyeccion social word basico',
            'grupo' => 'NNN',
           'cant_estudiantes' => 20,
        )
    );	
    
    DB::table('clase')->insert(
        array(
            'id' => 'INBCART101211116',
            'nombre' => 'Informatica basica',
            'grupo' => 'CART101',
            'creditos' => 2,
            'cant_estudiantes' => 18,
            'semestre' => 1,
        )
    );

    DB::table('clase')->insert(
        array(
            'id' => 'FDPADMIN801D211116',
            'nombre' => 'Fromulacion de proyectos',
            'grupo' => 'ADMIN801D',
            'creditos' => 3,
            'cant_estudiantes' => 16,
            'semestre' => 8,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'INFAGRO101211116',
            'nombre' => 'Informatica',
            'grupo' => 'AGRO101',
            'creditos' => 2,
            'cant_estudiantes' => 15,
            'semestre' => 1,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'INFAGRO102211116',
            'nombre' => 'Informatica',
            'grupo' => 'AGRO102',
            'creditos' => 2,
            'cant_estudiantes' => 15,
            'semestre' => 1,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'SSDDNNN211116',
            'nombre' => 'Semillero semframe de desarrollo',
            'cant_estudiantes' => 10,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EL4CONT801D211116',
            'nombre' => 'Electiva 4',
            'grupo' => 'CONT801D',
            'creditos' => 3,
            'cant_estudiantes' => 24,
            'semestre' => 8,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EP3SIS901211116',
            'nombre' => 'Electiva profesional 2',
            'grupo' => 'SIS901',
            'creditos' => 3,
            'cant_estudiantes' => 16,
            'semestre' => 9,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PPS2CART301211116',
            'nombre' => 'Prgramacion para SIG 2',
            'grupo' => 'CART301',
            'creditos' => 4,
            'cant_estudiantes' => 14,
            'semestre' => 3,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PPS1CART301211116',
            'nombre' => 'Programacion para SIG 1',
            'grupo' => 'CART301',
            'creditos' => 4,
            'cant_estudiantes' => 14,
            'semestre' => 3,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EBDI1ELEC405211116',
            'nombre' => 'Electiva basica de ingenieria 1',
            'grupo' => 'ELEC405',
            'creditos' => 3,
            'cant_estudiantes' => 17,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'CDD1SIS601211116',
            'nombre' => 'Comunicacion de datos 1',
            'grupo' => 'SIS601',
            'creditos' => 3,
            'cant_estudiantes' => 21,
            'semestre' => 6,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EDPADMIN901D211116',
            'nombre' => 'Evaluacion de proyectos',
            'grupo' => 'ADMIN901D',
            'creditos' => 4,
            'cant_estudiantes' => 8,
            'semestre' => 9,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EDPADMIN901N211116',
            'nombre' => 'Evaluacion de proyectos',
            'grupo' => 'ADMIN901N',
            'creditos' => 4,
            'cant_estudiantes' => 8,
            'semestre' => 9,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PDGSIS1001211116',
            'nombre' => 'Proyecto de grado',
            'grupo' => 'SIS1001',
            'creditos' => 3,
            'cant_estudiantes' => 8,
            'semestre' => 10,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'EL7ADMIN1001D211116',
            'nombre' => 'Electiva 7',
            'grupo' => 'ADMIN1001D',
            'creditos' => 2,
            'cant_estudiantes' => 17,
            'semestre' => 10,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'IAP1SIS801211116',
            'nombre' => 'Int artificial profundizacion 1',
            'grupo' => 'SIS801',
            'creditos' => 2,
            'cant_estudiantes' => 20,
            'semestre' => 8,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PSPNNN211116',
            'nombre' => 'Proyeccion social photoshow',
            'cant_estudiantes' => 20,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'SIOSIS501211116',
            'nombre' => 'Sistemas operativos',
            'grupo' => 'SIS501',
            'creditos' => 2,
            'cant_estudiantes' => 30,
            'semestre' => 5,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'LYASIS101211116',
            'nombre' => 'Logica y algoritmia',
            'grupo' => 'SIS101',
            'creditos' => 3,
            'cant_estudiantes' => 39,
            'semestre' => 1,
        )
    );	
    DB::table('clase')->insert(
        array(
            'id' => 'BIOEDUFISICA201211116',
            'nombre' => 'Bioestadistica',
            'grupo' => 'EDUFISICA201',
            'creditos' => 2,
            'cant_estudiantes' => 39,
            'semestre' => 2,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'CYDLEBEC211116',
            'nombre' => 'Constitucion y democracia',
            'grupo' => 'LEBEC',
            'creditos' => 3,
            'cant_estudiantes' => 16,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PYAFADMIN501N211116',
            'nombre' => 'Planeacion y analisis financiero',
            'grupo' => 'ADMIN501N',
            'creditos' => 3,
            'cant_estudiantes' => 22,
            'semestre' => 5,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'IDS1SIS501211116',
            'nombre' => 'Ingenieria de software 1',
            'grupo' => 'SIS501',
            'creditos' => 3,
            'cant_estudiantes' => 30,
            'semestre' => 5,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'BIOEDUFISICA202211116',
            'nombre' => 'Bioestadistica',
            'grupo' => 'EDUFISICA202',
            'creditos' => 2,
            'cant_estudiantes' => 35,
            'semestre' => 2,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'COPCONT401D211116',
            'nombre' => 'Contabilidad publica',
            'grupo' => 'CONT401D',
            'creditos' => 3,
            'cant_estudiantes' => 29,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'COPCONT401N211116',
            'nombre' => 'Contabilidad publica',
            'grupo' => 'CONT401N',
            'creditos' => 3,
            'cant_estudiantes' => 27,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'FDPELECT204211116',
            'nombre' => 'Fundamentos de programacion',
            'grupo' => 'ELECT204',
            'creditos' => 3,
            'cant_estudiantes' => 27,
            'semestre' => 2,
        )
    );

    DB::table('clase')->insert(
        array(
            'id' => 'ADFADMIN601D211116',
            'nombre' => 'Administracion financiera',
            'grupo' => 'ADMIN601D',
            'creditos' => 3,
            'cant_estudiantes' => 16,
            'semestre' => 6,
        )
    );

    DB::table('clase')->insert(
        array(
            'id' => 'BDDSIS401211116',
            'nombre' => 'Bases de datos',
            'grupo' => 'SIS401',
            'creditos' => 4,
            'cant_estudiantes' => 25,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'SDICCONT702N211116',
            'nombre' => 'Sistemas de informacion contable',
            'grupo' => 'CONT702N',
            'creditos' => 3,
            'cant_estudiantes' => 25,
            'semestre' => 7,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'BIOSIS401211116',
            'nombre' => 'Biologia',
            'grupo' => 'SIS401',
            'creditos' => 2,
            'cant_estudiantes' => 30,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'SDP1ADMIN701D211116',
            'nombre' => 'Sistemas de produccion 1',
            'grupo' => 'ADMIN701D',
            'creditos' => 2,
            'cant_estudiantes' => 24,
            'semestre' => 7,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'CONCONT401D211116',
            'nombre' => 'Contabilidad 4',
            'grupo' => 'CONT401D',
            'creditos' => 3,
            'cant_estudiantes' => 22,
            'semestre' => 4,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'COECONT601N211116',
            'nombre' => 'Contabilidades especiales',
            'grupo' => 'CONT601N',
            'creditos' => 3,
            'cant_estudiantes' => 40,
            'semestre' => 6,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'PR1SIS201211116',
            'nombre' => 'Programacion 1',
            'grupo' => 'SIS201',
            'creditos' => 3,
            'cant_estudiantes' => 19,
            'semestre' => 2,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'SDICONT701D211116',
            'nombre' => 'Sistemas de informacion',
            'grupo' => 'CONT701D',
            'creditos' => 3,
            'cant_estudiantes' => 18,
            'semestre' => 7,
        )
    );
    DB::table('clase')->insert(
        array(
            'id' => 'ADFADMIN601N211116',
            'nombre' => 'Administracion financiera',
            'grupo' => 'ADMIN601N',
            'creditos' => 3,
            'cant_estudiantes' => 21,
            'semestre' => 6,
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
		Schema::drop('clase');
	}

}
