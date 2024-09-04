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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id(); // ID_Factura (PK)
            $table->unsignedBigInteger('client_id'); // ID_Cliente (FK)
            $table->unsignedBigInteger('project_id'); // ID_Proyecto (FK)
            $table->date('issue_date'); // Fecha_Emisión
            $table->date('due_date'); // Fecha_Vencimiento
            $table->decimal('total_amount', 10, 2); // Monto_Total
            $table->enum('status', ['paid', 'pending', 'overdue']); // Estado
            $table->timestamps(); // created_at and updated_at

            $table->foreign('client_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('facturas');
    }
};
