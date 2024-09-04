<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id', 
        'project_id', 
        'issue_date', 
        'due_date', 
        'total_amount', 
        'status'
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'client_id');
    }

    public function proyectos()
    {
        return $this->belongsTo(Proyecto::class, 'project_id');
    }
}
