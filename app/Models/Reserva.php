<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    protected $fillable = ['numpersonas','fechahora','user_id','tour_id'];
}
