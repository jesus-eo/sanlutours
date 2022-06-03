<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'nombre' => 'Manuela Dominguez',
            'descripcion' => 'Cómo puedo empezar a describir mi tiempo con SanluTours... ¡Simplemente me cambió la vida! Siempre imaginé que Sanlúcar de Barrameda sería un destino impresionante, pero gracias a SanluTours, pude no solo experimentar la cultura, gastronomía, sino también tener recuerdos únicos en la vida. Obtuve mucho más de lo que esperaba de mis vacaciones.',
        ]);

    }
}
