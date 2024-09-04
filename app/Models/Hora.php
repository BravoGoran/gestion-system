<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 
        'project_id', 
        'date', 
        'hours', 
        'task_description'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'employee_id');
    }
    
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'project_id');
    }
}
