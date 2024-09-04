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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // ID_Cliente (PK)
            $table->string('name'); // Nombre
            $table->string('address'); // Dirección
            $table->string('phone'); // Teléfono
            $table->string('email')->unique(); // Email
            $table->timestamp('registered_at'); // Fecha_Registro
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
        Schema::dropIfExists('clientes');
    }
};
