<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
    protected $fillable = ['fechahora','tour_id','plazas'];
}
