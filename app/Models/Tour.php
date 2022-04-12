<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function guias(){
        return $this->belongsToMany(Guia::class);
    }
    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
    protected $fillable = ['nombre','descripcion','planing', 'fechahora', 'plazas', 'tipo', 'imagen', 'precio', 'duracion', 'valoracion', 'latitud', 'longitud'];
}
