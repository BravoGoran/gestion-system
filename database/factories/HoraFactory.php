<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\Hora;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class HoraFactory extends Factory
{
    protected $model = Hora::class;

    public function definition()
    {
        return [
            'employee_id' => Empleado::factory(),
            'project_id' => Proyecto::factory(),
            'date' => $this->faker->date(),
            'hours' => $this->faker->numberBetween(1, 8),
        ];
    }
}
