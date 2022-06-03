<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Tipo free */
        $tour = new Tour();
        $tour->nombre = 'Carreras de caballos' ;
        $tour->descripcion= 'Visita guiada para visualizar uno de los mayores espectáculos de la provincia y aprovechar las puestas de sol que nos ofrece la desembocadura del Guadalquivir' ;
        $tour->planing= 'Quedaremos en la plaza del cabildo donde emprenderemos el tour, recorreremos la calzada llegando a la playa lugar donde es artificie este evento tan exclusivo de esta ciudad, después conoceremos los palcos donde se vive un ambiente majestuoso y desde allí podremos visualizar el gran evento como las carreras de caballos.' ;
        $tour->tipo= 'free'  ;
        $tour->imagen= 'Img/img Freetours/tour carreras.jpg' ;
        $tour->duracion= '2';
        $tour->precio= '0' ;
        $tour->valoracion= '0';
        $tour->latitud= '36.779315938100346';
        $tour->longitud= '-6.354207404186242';

        $tour1 = new Tour();
        $tour1->nombre = 'Sanlucar Medieval' ;
        $tour1->descripcion= 'Tener una experiencia inolvidable en una de las ciudades más longevas de nuestro país y que lo hagas con alguien que desea trasmitir ese cariño sobre ella, sera un recuerdo inolvidable.' ;
        $tour1->planing= ' La ruta se inicia en Plaza del Cabildo, debajo del reloj y el bar Barbiana, aquí descubriremos que Sanlúcar fue la puerta de América, seguimos en Plaza de San Roque donde hablaremos de las iglesias y conventos y pasaremos por el mercado, Covachas, cuesta de Belén, donde explicaremos los monumentos por donde pasamos, seguimos por Palacio Orleans Borbon, hablaremos de él y subimos al Palacio de Medina Sidonia y de la iglesia parroquia de la Ol, subimos por la calle Luis de Eguilaz hablaremos del monumento a la circunnavegación convento jesuita y Casa de la Cilla, seguimos por el callejón de la Comedia donde hablaremos de sus bodegas e historia, llegamos hasta el Castillo de Santiago, donde ps contaré algo de su historia y curiosidades.';
        $tour1->tipo=  'free' ;
        $tour1->imagen=  'Img/img Freetours/tour medieval.jpg';
        $tour1->duracion='1' ;
        $tour1->precio= '0' ;
        $tour1->valoracion='0' ;
        $tour1->latitud='36.779315938100346' ;
        $tour1->longitud= '-6.354207404186242';

        $tour2 = new Tour();
        $tour2->nombre ='Barrio Alto de Sanlúcar' ;
        $tour2->descripcion= 'Palacios, castillos, iglesias… Recorre con nosotros el Barrio Alto de Sanlúcar y conoce los secretos y leyendas que atesora el centro histórico de esta bella localidad gaditana.' ;
        $tour2->planing= 'Nos encontraremos en la aveniza Calzada de la Duquesa Isabel y comenzaremos esta visita guiada a pie por el centro histórico de Sanlúcar.
        Iniciaremos el tour repasando la historia de esta popular avenida, una de las arterias principales de la localidad. Nuestros pasos nos conducirán hasta la Plaza del Cabildo, donde encontraremos la Plaza de la Circunnavegación. Recordaremos este mítico viaje en el que, partiendo desde Sanlúcar, Magallanes consiguió por vez primera rodear el globo terrestre. Esta plaza separa las calles del Barrio Bajo y del Barrio Alto, en el que nos internaremos a continuación.Visitaremos la Casa de Contratacoón de las Américas y después nos dirigiremos a la basílica de Nuestra Señora de la Caridad, patrona de Sanlúcar. Desde aquí, caminaremos hasta la Casa de la Hermandad del Rocío y a la iglesia de los Desamparados, perfecto para descubrir la tradición católica de la localidad.';
        $tour2->tipo= 'free';
        $tour2->imagen=  'Img/img Freetours/tour barrioalto.jpg';
        $tour2->duracion= '1';
        $tour2->precio= '0';
        $tour2->valoracion= '0';
        $tour2->latitud= '36.7800839841315';
        $tour2->longitud= '-6.354969144663216';

        $tour3 = new Tour();
        $tour3->nombre = 'Puerta de América' ;
        $tour3->descripcion= 'La visita se llevará a cabo por las calles y plazas más céntricas y emblemáticas de la ciudad, coincidiendo con muchos de sus monumentos civiles y religiosos. Incluyo un recorrido por el mercado de abastos dónde podrán comprobar porque Sanlúcar ha sido designada Capital Gastronómica de España 2022.' ;
        $tour3->planing= ' El inicio del tour lo comenzaremos en el "Barrio Bajo", siendo el inicio en la Plaza del Cabildo, siguiendo por Plaza de San Roque, Trascuesta, Mercado de Abastos y Covachas para ir subiendo hasta el "Barrio Alto" habiendo dejado atrás calles céntricas de iglesias y conventos. Al finalizar la subida por la cuesta más histórica de la villa, nos recibirá el imponente Palacio de Orleans (Actual Ayuntamiento), de allí al Palacio Ducal de Medina Sidonia y la Parroquia de la O; para finalizar el recorrido por la parte alta de la ciudad llegaremos  una de las construcciones aún en uso más antiguas que se conservan, el Castillo de Santiago (S.XV), pasando por calles emblemáticas con sus bodegas de Manzanillas.';
        $tour3->tipo=  'free' ;
        $tour3->imagen= 'Img/img Freetours/tour america.jpg' ;
        $tour3->duracion= '2';
        $tour3->precio= '0' ;
        $tour3->valoracion='0';
        $tour3->latitud= '36.779315938100346';
        $tour3->longitud= '-6.354207404186242';

        /* Tipo gastronomico */


        $tour4= new Tour();
        $tour4->nombre = 'Taberna guerrita' ;
        $tour4->descripcion=  'El escondite está en una vieja esquina con puertas a Rubiños y San Salvador. Dentro de la taberna, sus más de cuarenta años de historia, aparecen representados en las paredes, en los viejos carteles de toros, en el olor a vino antiguo';
        $tour4->planing= ' Quedaremos en la Calle San Salvador, esquina con Rubiños, llegamos a la taberna. Lleva más de 40 años escondida en El Barrio, en Sanlúcar. Somos gente de pueblo, de barrio bajo.Probaremos cada estación los platos especiales  que nos da el entorno. ';
        $tour4->tipo=  'gastronómico' ;
        $tour4->imagen= 'Img/Img gastronomia/tour guerrita.jpg ' ;
        $tour4->duracion= '2';
        $tour4->precio= '40' ;
        $tour4->valoracion= '0';
        $tour4->latitud= '36.78439091152433';
        $tour4->longitud= '-6.346416615827217';

        $tour5 = new Tour();
        $tour5->nombre =  'Casa Balbino';
        $tour5->descripcion= 'Conocida en medio mundo, las Tortillas de Camarones es un plato muy especial que no todos saben cocinar. Casa Balbino es considerada por muchos "El Templo de las Tortillas de Camarones". Ahora te toca a ti descubrir por qué.' ;
        $tour5->planing= ' Quedaremos en la plaza cabildo donde partiremos para el bar de destino en el cual haremos una cata de las mejores tortillas de camarones del mundo acompañadas de nuestra manzanilla y pescadito de nuestra lonja.';
        $tour5->tipo=  'gastronómico' ;
        $tour5->imagen=  'Img/Img gastronomia/tour balbino.jpg' ;
        $tour5->duracion= '1';
        $tour5->precio= '20' ;
        $tour5->valoracion= '0';
        $tour5->latitud= '36.77929015839103';
        $tour5->longitud= '-6.3540893869914825';

        $tour6 = new Tour();
        $tour6->nombre = 'Bodegas hidalgo'  ;
        $tour6->descripcion= 'Plaza del Cabildo, Mercado de Abastos, su gente, su vida. Siempre acompañado por un sanluqueño o sanluqueña. Cata de vinos en privado con venencia desde la bota.' ;
        $tour6->planing= ' Partiremos desde la plaza de san roque, disfrutaremos de un paseo tranquilo por el Mercado de Abastos de Sanlúcar, uno de los más populares de Andalucía, un espectáculo visual y sensorial de mar y de tierra. Rondando las 13.00h nos iremos a Bodegas Hidalgo La Gitana para perdernos por sus patios y bodegas y catar 2 Manzanillas en Rama desde la bota en su bodega catedral y otros 3 vinos más en mesa, siempre con la copa en la mano, para acabar en Restaurante EntreBotas (ubicado en uno de los patios de la bodega) y disfrutar de un menú genial, para, sencillamente... VOLAR.';
        $tour6->tipo= 'gastronómico'  ;
        $tour6->imagen= 'Img/Img gastronomia/tour hidalgo.jpg ' ;
        $tour6->duracion= '3';
        $tour6->precio= '40' ;
        $tour6->valoracion= '0';
        $tour6->latitud= '36.77819942087469';
        $tour6->longitud= '-6.353805644663286';

        $tour7 = new Tour();
        $tour7->nombre = 'Museo de la manzanilla' ;
        $tour7->descripcion= 'Sanlúcar no sería Sanlúcar sin su Gastronomía y sus vinos, y queremos que la descubras desde dentro.';
        $tour7->planing= ' Punto de encuentro en la Oficina de Turismo de La Calzada una ruta por el Barrio Alto de Sanlúcar, Museo de la Manzanilla, copa y degustación de queso de cabra y algas.';
        $tour7->tipo= 'gastronómico'  ;
        $tour7->imagen=  'Img/Img gastronomia/tour museo.jpg ';
        $tour7->duracion= '2';
        $tour7->precio= '20' ;
        $tour7->valoracion= '0';
        $tour7->latitud= '36.78118179200032';
        $tour7->longitud= '-6.355275960006743';

        /* Tipo cultural */

        $tour8 = new Tour();
        $tour8->nombre = 'Auditorio de la Merced' ;
        $tour8->descripcion= 'El Auditorio de la Merced fue anteriormente un convento que a su vez reemplazó una antigua ermita. En la actualidad acoge actos culturales.' ;
        $tour8->planing=' El punto de encuentro será la plazoleta san roque donde partiremos hacia la cuesta belén que nos llevara al auditorio, es un bello edificio de estilo protobarroco construido en el siglo XVII. Aunque en la actualidad acoge actos culturales, fue anteriormente un convento que a su vez reemplazó una antigua ermita.' ;
        $tour8->tipo=  'cultural' ;
        $tour8->imagen= 'Img/Img Cultural/tour merced.jpg ' ;
        $tour8->duracion= '1';
        $tour8->precio= '12' ;
        $tour8->valoracion= '0';
        $tour8->latitud= '36.77815645406177';
        $tour8->longitud= ' -6.353827102335061';

        $tour9 = new Tour();
        $tour9->nombre = 'Castillo de Santiago' ;
        $tour9->descripcion= 'Recorre con nosotros el Barrio Alto de Sanlúcar y conoce los secretos y leyendas que atesora el castillo de esta bella localidad gaditana, el cual aguarda muchos misterios en su interior.' ;
        $tour9->planing=' Partiremos desde la plaza de la paz situada en el barrio alto sanluqueño, recorreremos sus calles pasando por la iglesia con más historia de la ciudad, seguiremos la marcha hasta llegar al fabuloso castillo donde lo recorreremos y contemplaremos algún acto teatral.
        '  ;
        $tour9->tipo=  'cultural' ;
        $tour9->imagen=  'Img/Img Cultural/tour castillo.jpg ' ;
        $tour9->duracion= '3';
        $tour9->precio= '40' ;
        $tour9->valoracion= '0';
        $tour9->latitud='36.77512293616523' ;
        $tour9->longitud= '-6.352840049430512';

        $tour10 = new Tour();
        $tour10->nombre = 'Las covachas' ;
        $tour10->descripcion=  'Las Covachas, una antigua lonja formada por una arcada gótica con un friso decorado con grifos y sirenas, situada en una muralla medieval, que en la actualidad sostiene los jardines del Palacio de Medina Sidonia.' ;
        $tour10->planing= ' Partiremos desde la Plaza de San Roque, tomando la Calle Bretones, llegaremos al Mercado y a la Cuesta de Belén donde se encuentra Las Covachas, una antigua lonja formada por una arcada gótica con un friso decorado con grifos y sirenas, situada en una muralla medieval, que en la actualidad sostiene los jardines del Palacio de Medina Sidonia.';
        $tour10->tipo=  'cultural' ;
        $tour10->imagen= 'Img/Img Cultural/tour cobachas.jpg' ;
        $tour10->duracion= '1';
        $tour10->precio= '10' ;
        $tour10->valoracion= '0';
        $tour10->latitud= '36.77815645406177';
        $tour10->longitud= '-6.353827102335061';

        $tour11 = new Tour();
        $tour11->nombre = 'Palacio de Orleans' ;
        $tour11->descripcion=  'Fue habitado por la familia Orleans y borbón hasta 1955. En 1971 se vendió para ser demolido, pero ocho años más tarde, fue adquirido y recuperado por el Ayuntamiento de Sanlúcar de Barrameda.' ;
        $tour11->planing='El punto de encuentro será en la puerta del mismo palacio, visitaremos las dos partes que consta dicho palacio: el seminario y la casa Páez de la Cadena. Cada uno se organiza en torno a un patio central. Un conjunto residencial que está formado por un cuerpo compacto de tres plantas, unas dependencias exentas tipo pabellón y unas zonas ajardinadas a su alrededor.' ;
        $tour11->tipo=  'cultural' ;
        $tour11->imagen= 'Img/Img Cultural/tour palacio.jpeg' ;
        $tour11->duracion='2';
        $tour11->precio= '25' ;
        $tour11->valoracion= '0';
        $tour11->latitud= '36.77589998550651';
        $tour11->longitud= '-6.354594232238713';

        /* Tour deportivo */

        $tour12 = new Tour();
        $tour12->nombre = 'Paseo a caballo por Doñana ' ;
        $tour12->descripcion= ' Ver el atardecer en Doñana es una de las cosas más bonitas del mundo. Su luz especial, la fina arena de sus playas. Con este tour te llevamos a Doñana desde Sanlúcar para disfrutar de una experiencia inolvidable. ' ;
        $tour12->planing= ' Partimos desde bajo de guía, antes de llegar a la playa de Matalsacañas donde tiene lugar la ruta de 2 horas a caballo nos pararemos en El Rocio, una aldea donde las calles son de arena. Haremos una visita guiada de sus calles, su marisma y su Ermita. Nuestro guía les aconsejará un restaurante popular y les guiará en la elección del menú si lo desean (almuerzo no inclído en el precio del tour). Después de comer haremos la ruta a caballo hasta la puesta de sol.';
        $tour12->tipo= 'deportivo';
        $tour12->imagen= 'Img/img Deportivo/tour caballo.jpg ';
        $tour12->duracion= '4';
        $tour12->precio= '50';
        $tour12->valoracion= '0';
        $tour12->latitud= '36.78673492820688';
        $tour12->longitud= '-6.35492973117068';

        $tour13 = new Tour();
        $tour13->nombre = 'Paseo en kayak'  ;
        $tour13->descripcion=  ' En esta ruta en kayak conocerás la desembocadura del Guadalquivir y las bonitas vistas que tiene del Espacio Natural de Doñana y de la Cuidad de Sanlúcar de Barrameda, un enclave muy importante históricamente ya que desde aquí partieron importantes expediciones. ';
        $tour13->planing= ' Tenemos como punto de salida la playa de Bajo de Guía, cruzamos el Guadalquivir desde la orilla de Sanlúcar en Cádiz hasta la de Doñana ya en provincia de Huelva, desde aquí ya tenemos unas vistas de Sanlúcar diferenciando el barrio alto y el barrio bajo, el castillo de Santiago y las principales iglesias. Una vez en la orilla de Doñana vamos hacia el norte remando con los kayak cerca de la orilla disfrutando de la mayor playa virgen de Europa, llegaremos a una pequeña marisma mareal donde podemos ver aves acuáticas como garzas reales, garcetas, agujas colinegras y, como no gaviotas, con un poco de suerte podemos ver ciervos y jabalíes. Ya de vuelta tenemos el Baluarte de San Salvador a proa del kayak en la orilla de Sanlúcar, una antigua fortaleza del siglo XVII, mandada construir para defender la entrada del Río Guadalquivir. Tras una parada para descansar solo nos queda llegar a Bajo de Guía.';
        $tour13->tipo=  'deportivo';
        $tour13->imagen= 'Img/img Deportivo/tour kayak.jpg ';
        $tour13->duracion= '2';
        $tour13->precio= '35' ;
        $tour13->valoracion= '0';
        $tour13->latitud= '36.78735327957801';
        $tour13->longitud= '-6.35513361392574';

        $tour14 = new Tour();
        $tour14->nombre = 'Ruta en paddlesurf';
        $tour14->descripcion= ' Partiremos desde la playa de bajo de guía. Las rutas que realizamos en paddle surf se realizan por la desembocadura del Guadalquivir a su paso por Sanlúcar de Barrameda. Dependiendo de las condiciones de viento y corriente plantearemos el recorrido más favorable. Ya que con las tablas de paddle surf es complicado avanzar en contra de corriente. Dicho esto, no queremos que te asustes, la actividad se puede realizar sin ninguna experiencia. Con las explicaciones de nuestros guías aprenderás a llevar a controlar la tabla de paddle surf sin ningún problema.';
        $tour14->planing= 'Una buena forma de conocer el Entorno de Doñana, es hacerlo encima de una tabla de paddle surf. Este deporte tiene un gran aumento de participantes en los últimos años, si vienes a probarlo seguro que te gusta. ¿Será por la sensación de deslizarte sobre el agua con una tabla?';
        $tour14->tipo=  'deportivo' ;
        $tour14->imagen=  'Img/img Deportivo/tour paddlesurf.jpg ';
        $tour14->duracion= '2';
        $tour14->precio=  '30';
        $tour14->valoracion= '0';
        $tour14->latitud= '36.78735327957801';
        $tour14->longitud= '-6.35513361392574';

        $tour15 = new Tour();
        $tour15->nombre = 'Ruta en bicicleta por la marisma ' ;
        $tour15->descripcion= 'Una de las rutas en bicicletas mas bonitas que podemos realizar dentro del Espacio Natural de Doñana. La impresionante llanura, la gran cantidad de aves a pocos metros del camino o las vistas que tenemos del río Guadalquivir. Son algunos de las muchos atractivos que tiene esta ruta en bicicleta por las marismas del Parque Natural de Doñana en Sanlúcar de Barrameda, Cádiz' ;
        $tour15->planing= ' Comenzaremos en el campo de futbol de la algaida.
        Durante todo el recorrido permanecemos en el Parque Natural de Doñana. El camino en tramos esta bacheado, con algún tramo corto de tierra sulta. En su mayoria es tierra compactada que hace fácil rodar en bicicleta, en épocas de lluvia puede ser impracticable por el fango.
        La ruta discurre por la orila de Sanlúcar, empezando en la entrada del Parque Natural de Doñana a la altura de las salinas de Bonanza. El recorrido es de ida y vuelta, compartiendo parte del recorrido a la vuelta.';
        $tour15->tipo= 'deportivo'  ;
        $tour15->imagen= 'Img/img Deportivo/tour ciclismo.jpg ' ;
        $tour15->duracion= '2';
        $tour15->precio= '30' ;
        $tour15->valoracion= '0';
        $tour15->latitud= '36.819346362331196';
        $tour15->longitud= '-6.333152852535913';
    }
}
