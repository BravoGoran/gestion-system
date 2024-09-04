<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    protected $model = Proyecto::class;

    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween('-30 year', 'now');

        $end_date = $this->faker->optional()->dateTimeBetween($start_date, 'now');

        if ($end_date) {
            $status = 'completed';
        } else {
            $status = $this->faker->randomElement(['in_progress', 'on_hold']);
        }
        
        return [
            'client_id' => Cliente::factory(),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
        ];
    }
}
