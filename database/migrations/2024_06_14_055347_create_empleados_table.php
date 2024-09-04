<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id(); // ID_Empleado (PK)
            $table->string('first_name'); // Nombre
            $table->string('last_name'); // Apellidos
            $table->string('address'); // Dirección
            $table->string('phone'); // Teléfono
            $table->string('email')->unique(); // Email
            $table->date('hire_date'); // Fecha_Contratación
            $table->string('position'); // Cargo
            $table->timestamps(); // created_at and updated_at
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
};
