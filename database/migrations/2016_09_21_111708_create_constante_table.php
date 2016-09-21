<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constante', function(Blueprint $table)
        {
            $table->string('id');
            $table->primary('id');
            $table->string('valor',100)->nullable();
            
            $table->timestamps();
        });
        DB::table('constante')->insert(
        array(
            'id' => 'INISEM',
        )
    );
    DB::table('constante')->insert(
        array(
            'id' => 'FINSEM',
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
        Schema::drop('constante');
    }
}
