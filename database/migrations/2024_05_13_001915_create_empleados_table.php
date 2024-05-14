<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('primer_apellido', 20);
            $table->string('segundo_apellido', 20);
            $table->string('primer_nombre', 20);
            $table->string('otros_nombres', 50)->nullable();
            $table->enum('pais_del_empleo', ['Colombia', 'Estados Unidos']);
            $table->string('tipo_identificacion');
            $table->string('numero_identificacion', 20)->unique();
            $table->string('correo_electronico', 300)->unique();
            $table->date('fecha_ingreso');
            $table->string('area');
            $table->enum('estado', ['Activo']);
            $table->timestamp('fecha_y_hora_de_registro')->useCurrent();
            $table->timestamps(); // Este campo añade automáticamente created_at y updated_at

            // Índices
            $table->index(['primer_apellido', 'segundo_apellido', 'primer_nombre', 'numero_identificacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
