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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id(); // ID_Proyecto (PK)
            $table->unsignedBigInteger('client_id'); // ID_Cliente (FK)
            $table->string('name'); // Nombre_Proyecto
            $table->text('description'); // Descripción
            $table->date('start_date'); // Fecha_Inicio
            $table->date('end_date')->nullable(); // Fecha_Finalización
            $table->enum('status', ['in_progress', 'completed', 'on_hold']); // Estado
            $table->timestamps(); // created_at and updated_at
            
            $table->foreign('client_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};
