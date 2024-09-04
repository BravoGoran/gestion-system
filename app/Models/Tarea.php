<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 
        'employee_id', 
        'description', 
        'start_date', 
        'end_date', 
        'status'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class,'project_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'employee_id');
    }
}
