<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8'; 
            $table->collation = 'utf8_unicode_ci'; 
            
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('fechaNacimiento', 100);
            $table->string('correoElectronico', 100)->unique();
            $table->string('clave', 100);
            $table->string('telefono', 100)->nullable();
            $table->text('direccion', 100)->nullable();
            $table->ipAddress('ip', 20)->nullable();
            $table->string('estadoCivil', 20)->nullable();
            $table->decimal('sueldoAnual', 10, 3);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['nombre', 'apellidos','fechaNacimiento']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
