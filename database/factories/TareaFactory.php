<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\Tarea;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween('-10 year', 'now');

        $end_date = $this->faker->optional()->dateTimeBetween($start_date, 'now');

        if ($end_date) {
            $status = 'completed';
        } else {
            $status = $this->faker->randomElement(['in_progress', 'pending']);
        }

        return [
            'project_id' => Proyecto::factory(),
            'employee_id' => Empleado::factory(),
            'description' => $this->faker->sentence(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
        ];
    }
}

