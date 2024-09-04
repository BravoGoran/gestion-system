<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 
        'name', 
        'description', 
        'start_date', 
        'end_date', 
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'client_id');
    }

    public function tarea()
    {
        return $this->hasMany(Tarea::class);
    }

    public function factura()
    {
        return $this->hasMany(Factura::class);
    }

    public function horasTrabajo()
    {
        return $this->hasMany(Hora::class);
    }
}
