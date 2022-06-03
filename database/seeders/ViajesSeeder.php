<?php

namespace Database\Seeders;

use App\Models\Viaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viajes')->insert([

            [
                'tour_id'=>'1' ,
       'fechahora'=> '27/07/2022 12:00:00',
       'plazas'=> '10',
            ],
            [

                'tour_id'=> '1',
                'fechahora'=> '28/07/2022 16:00:00',
                'plazas'=> '10',
            ],
            [

       'tour_id'=>'5' ,
       'fechahora'=> '30/07/2022 17:00:00',
       'plazas'=> '10',
            ],
            [

       'tour_id'=> '2',
       'fechahora'=>'01/08/2022 11:00:00' ,
       'plazas'=> '10',
            ],
            [


        'tour_id'=> '2',
        'fechahora'=>'02/08/2022 18:00:00' ,
        'plazas'=> '10',
            ],
            [

                'tour_id'=>'2' ,
                'fechahora'=> '03/08/2022 16:00:00',
                'plazas'=> '10',
            ],
            [


       'tour_id'=>'3' ,
       'fechahora'=> '04/08/2022 12:00:00',
       'plazas'=> '10',
            ],
            [


       'tour_id'=> '3',
       'fechahora'=>'05/08/2022 18:30:00',
       'plazas'=>'10' ,
            ],
            [


      'tour_id'=> '4',
      'fechahora'=> '09/08/2022 12:15:00',
      'plazas'=> '10',
            ],
            [


        'tour_id'=> '4',
        'fechahora'=>'10/08/2022 18:15:00' ,
        'plazas'=> '10',

            ],
            [

     'tour_id'=> '5',
     'fechahora'=>'10/08/2022 18:15:00' ,
     'plazas'=> '10',

            ],
            [

               'tour_id'=> '5',
               'fechahora'=> '28/07/2022 16:00:00',
               'plazas'=>'10' ,

            ],
            [

              'tour_id'=> '6',
              'fechahora'=> '10/08/2022 18:15:00',
              'plazas'=>'10' ,

            ],
            [
                'tour_id'=> '6',
                'fechahora'=> '28/07/2022 16:00:00',
                'plazas'=> '10',
            ],
            [
                'tour_id'=> '7',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'7' ,
        'fechahora'=> '10/08/2022 18:15:00',
        'plazas'=> '10',
            ],
            [
                'tour_id'=> '8',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,

            ],[
                'tour_id'=>'8' ,
        'fechahora'=> '10/08/2022 18:15:00',
        'plazas'=> '10',
            ],[
                'tour_id'=> '9',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'9' ,
        'fechahora'=> '10/08/2022 18:15:00',
        'plazas'=> '10',

            ],
            [
                'tour_id'=> '10',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'10' ,
        'fechahora'=> '10/08/2022 18:21:00',
        'plazas'=> '10',
            ],
            [
                'tour_id'=> '11',
                'fechahora'=> '28/07/2022 16:00:00',
                'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'11' ,
                'fechahora'=> '10/08/2022 18:15:00',
                'plazas'=> '10',
            ],
            [
                'tour_id'=> '12',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'12' ,
        'fechahora'=> '10/08/2022 18:15:00',
        'plazas'=> '10',
            ],
            [
                'tour_id'=> '13',
                'fechahora'=> '28/07/2022 16:00:00',
                'plazas'=>'10' ,
            ],
            [

        'tour_id'=>'13' ,
        'fechahora'=> '10/08/2022 18:15:00',
        'plazas'=> '10',
            ],
            [
                'tour_id'=> '14',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'14' ,
                'fechahora'=> '10/08/2022 18:15:00',
                'plazas'=> '10',
            ],
            [
                'tour_id'=> '15',
                'fechahora'=> '28/07/2022 16:00:00',
                'plazas'=>'10' ,

            ],
            [
                'tour_id'=>'15' ,
                'fechahora'=> '10/08/2022 18:15:00',
                'plazas'=> '10',

            ],
            [
                'tour_id'=> '16',
        'fechahora'=> '28/07/2022 16:00:00',
        'plazas'=>'10' ,
            ],
            [
                'tour_id'=>'16' ,
                'fechahora'=> '10/08/2022 18:15:00',
                'plazas'=> '10',

            ],
        ]);


    }
}
