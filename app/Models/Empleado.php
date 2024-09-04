<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 
        'last_name', 
        'address', 
        'phone', 
        'email', 
        'hire_date', 
        'position'
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function horasTrabajo()
    {
        return $this->hasMany(Hora::class);
    }
}
