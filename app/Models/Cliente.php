<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'address', 
        'phone', 
        'email', 
        'registered_at',
        'password'
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
