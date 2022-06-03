<?php

namespace Database\Seeders;

use App\Models\Guia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guia = new Guia();
        $guia->nombre= 'Pedro';
        $guia->descripcion=' Soy una persona responsable, emprendedora y con capacidad de trabajo en equipo. Nací en la ciudad y he pasado toda mi vida en ella por lo que puedo garantizar una buena experiencia de la que quedaras con buen sabor de boca y querrás repetir.' ;
        $guia->valoracion= '0';
        $guia->imagen=  'Img/guia/guia4.jpg';
        $guia->tipo= 'free';

        $guia1 = new Guia();
        $guia1->nombre= 'Gabriel';
        $guia1->descripcion= '¡Bienvenidos viajeros a Sanlúcar de Barrameda! Soy Gabriel un apasionado de la historia y sobre todo de la historia de mi localidad natal. Sus calles y sus monumentos resumen hitos importantes de la historia de España. Me encantaría contaros todas estas cosas y su repercusión histórica así como contaros las leyendas que esconden sus calles y los muros de sus monumentos. ¡Os espero!';
        $guia1->valoracion='0' ;
        $guia1->imagen= 'Img/guia/guia5.jpg';
        $guia1->tipo= 'free';


        $guia2 = new Guia();
        $guia2->nombre='Guillermo' ;
        $guia2->descripcion= ' Nací en Conil (Cádiz) y soy Técnico Superior en Guía, Información y Asistencias Turísticas. Un enamorado de Sanlúcar desde que llegue para comenzar los estudios en 2010.
        Aparte de ser un gran conocedor de los rincones más escondidos de la ciudad, también me dedico profesionalmente al comisariado y la crítica de arte, y he trabajado y colaborado con galerías e instituciones andaluzas.';
        $guia2->valoracion='0' ;
        $guia2->imagen= 'Img/guia/guia6.jpg';
        $guia2->tipo= 'deportivo';

    }
}
