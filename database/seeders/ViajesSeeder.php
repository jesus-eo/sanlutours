<?php

namespace Database\Seeders;

use App\Models\Viaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viaje = new Viaje();
        $viaje->tour_id='1' ;
        $viaje->fechahora= '27/07/2022 12:00:00';
        $viaje->plazas= '10';

        $viaje2 = new Viaje();
        $viaje2->tour_id= '1';
        $viaje2->fechahora= '28/07/2022 16:00:00';
        $viaje2->plazas= '10';

        $viaje3 = new Viaje();
        $viaje3->tour_id='5' ;
        $viaje3->fechahora= '30/07/2022 17:00:00';
        $viaje3->plazas= '10';

        $viaje4 = new Viaje();
        $viaje4->tour_id= '2';
        $viaje4->fechahora='01/08/2022 11:00:00' ;
        $viaje4->plazas= '10';

        $viaje5 = new Viaje();
        $viaje5->tour_id= '2';
        $viaje5->fechahora='02/08/2022 18:00:00' ;
        $viaje5->plazas= '10';

        $viaje6 = new Viaje();
        $viaje6->tour_id='2' ;
        $viaje6->fechahora= '03/08/2022 16:00:00';
        $viaje6->plazas= '10';

        $viaje7 = new Viaje();
        $viaje7->tour_id='3' ;
        $viaje7->fechahora= '04/08/2022 12:00:00';
        $viaje7->plazas= '10';

        $viaje8 = new Viaje();
        $viaje8->tour_id= '3';
        $viaje8->fechahora='05/08/2022 18:30:00';
        $viaje8->plazas='10' ;

        $viaje9 = new Viaje();
        $viaje9->tour_id= '4';
        $viaje9->fechahora= '09/08/2022 12:15:00';
        $viaje9->plazas= '10';

        $viaje11 = new Viaje();
        $viaje11->tour_id= '4';
        $viaje11->fechahora='10/08/2022 18:15:00' ;
        $viaje11->plazas= '10';

        $viaje10 = new Viaje();
        $viaje10->tour_id= '5';
        $viaje10->fechahora='10/08/2022 18:15:00' ;
        $viaje10->plazas= '10';

        $viaje12 = new Viaje();
        $viaje12->tour_id= '5';
        $viaje12->fechahora= '28/07/2022 16:00:00';
        $viaje12->plazas='10' ;

        $viaje13 = new Viaje();
        $viaje13->tour_id= '6';
        $viaje13->fechahora= '10/08/2022 18:15:00';
        $viaje13->plazas='10' ;

        $viaje14 = new Viaje();
        $viaje14->tour_id= '6';
        $viaje14->fechahora= '28/07/2022 16:00:00';
        $viaje14->plazas= '10';

        $viaje15 = new Viaje();
        $viaje15->tour_id= '7';
        $viaje15->fechahora= '28/07/2022 16:00:00';
        $viaje15->plazas='10' ;

        $viaje16 = new Viaje();
        $viaje16->tour_id='7' ;
        $viaje16->fechahora= '10/08/2022 18:15:00';
        $viaje16->plazas= '10';


        $viaje17 = new Viaje();
        $viaje17->tour_id= '8';
        $viaje17->fechahora= '28/07/2022 16:00:00';
        $viaje17->plazas='10' ;

        $viaje18 = new Viaje();
        $viaje18->tour_id='8' ;
        $viaje18->fechahora= '10/08/2022 18:15:00';
        $viaje18->plazas= '10';


        $viaje19 = new Viaje();
        $viaje19->tour_id= '9';
        $viaje19->fechahora= '28/07/2022 16:00:00';
        $viaje19->plazas='10' ;

        $viaje20 = new Viaje();
        $viaje20->tour_id='9' ;
        $viaje20->fechahora= '10/08/2022 18:15:00';
        $viaje20->plazas= '10';

        $viaje21 = new Viaje();
        $viaje21->tour_id= '10';
        $viaje21->fechahora= '28/07/2022 16:00:00';
        $viaje21->plazas='10' ;

        $viaje22 = new Viaje();
        $viaje22->tour_id='10' ;
        $viaje22->fechahora= '10/08/2022 18:21:00';
        $viaje22->plazas= '10';

        $viaje23 = new Viaje();
        $viaje23->tour_id= '11';
        $viaje23->fechahora= '28/07/2022 16:00:00';
        $viaje23->plazas='10' ;

        $viaje24 = new Viaje();
        $viaje24->tour_id='11' ;
        $viaje24->fechahora= '10/08/2022 18:15:00';
        $viaje24->plazas= '10';

        $viaje25 = new Viaje();
        $viaje25->tour_id= '12';
        $viaje25->fechahora= '28/07/2022 16:00:00';
        $viaje25->plazas='10' ;

        $viaje26 = new Viaje();
        $viaje26->tour_id='12' ;
        $viaje26->fechahora= '10/08/2022 18:15:00';
        $viaje26->plazas= '10';

        $viaje27 = new Viaje();
        $viaje27->tour_id= '13';
        $viaje27->fechahora= '28/07/2022 16:00:00';
        $viaje27->plazas='10' ;

        $viaje28 = new Viaje();
        $viaje28->tour_id='13' ;
        $viaje28->fechahora= '10/08/2022 18:15:00';
        $viaje28->plazas= '10';

        $viaje29 = new Viaje();
        $viaje29->tour_id= '14';
        $viaje29->fechahora= '28/07/2022 16:00:00';
        $viaje29->plazas='10' ;

        $viaje30 = new Viaje();
        $viaje30->tour_id='14' ;
        $viaje30->fechahora= '10/08/2022 18:15:00';
        $viaje30->plazas= '10';

        $viaje31 = new Viaje();
        $viaje31->tour_id= '15';
        $viaje31->fechahora= '28/07/2022 16:00:00';
        $viaje31->plazas='10' ;

        $viaje32 = new Viaje();
        $viaje32->tour_id='15' ;
        $viaje32->fechahora= '10/08/2022 18:15:00';
        $viaje32->plazas= '10';

        $viaje33 = new Viaje();
        $viaje33->tour_id= '16';
        $viaje33->fechahora= '28/07/2022 16:00:00';
        $viaje33->plazas='10' ;

        $viaje34 = new Viaje();
        $viaje34->tour_id='16' ;
        $viaje34->fechahora= '10/08/2022 18:15:00';
        $viaje34->plazas= '10';

    }
}
