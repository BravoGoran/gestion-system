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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id(); // ID_Tarea (PK)
            $table->unsignedBigInteger('project_id'); // ID_Proyecto (FK)
            $table->unsignedBigInteger('employee_id'); // ID_Empleado (FK)
            $table->text('description'); // Descripción
            $table->date('start_date'); // Fecha_Inicio
            $table->date('end_date')->nullable(); // Fecha_Finalización
            $table->enum('status', ['pending', 'in_progress', 'completed']); // Estado
            $table->timestamps(); // created_at and updated_at

            $table->foreign('project_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
