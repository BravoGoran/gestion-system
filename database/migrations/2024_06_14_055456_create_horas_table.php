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
        Schema::create('horas', function (Blueprint $table) {
            $table->id(); // ID_Horas (PK)
            $table->unsignedBigInteger('employee_id'); // ID_Empleado (FK)
            $table->unsignedBigInteger('project_id'); // ID_Proyecto (FK)
            $table->date('date'); // Fecha
            $table->integer('hours'); // Horas
            $table->timestamps(); // created_at and updated_at
            
            $table->foreign('employee_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horas');
    }
};
