<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'client_id' => Cliente::factory(),
            'project_id' => Proyecto::factory(),
            'issue_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
            'status' => $this->faker->randomElement(['paid', 'pending', 'overdue']),
        ];
    }
}

