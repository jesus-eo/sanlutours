<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

    public function tours(){
        return $this->belongsToMany(Tour::class);
    }
    protected $fillable = ['nombre','descripcion', 'tipo', 'imagen', 'precio','valoracion'];
}
