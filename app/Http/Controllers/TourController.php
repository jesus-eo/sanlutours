<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Models\Tour;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Controlador para las rutas relacionadas con los tours.
 */
class TourController extends Controller
{
    /**
     * Vista de todos los tours con paginación o filtrados por nombre, tipo y ordenados por precio o duración.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        return view('dashboardadmin.crudtours', [
            "tours" => Tour::paginate(1),
            "busqueda" => Tour::where('nombre', 'ilike', "%$busqueda%")->orwhere('tipo', 'ilike', "%$busqueda%")->paginate(1)

        ]);
    }

    /**
     * Crea un tour.
     *
     * @param  \App\Http\Requests\StoreTourRequest  $request
     * @return \Illuminate\Http\Response
     *
     * Validamos la request con validated accediendo a la función rules de app/http/request/store...Request que es la encargada de validar.
     * Poner la authorizacion a true
     * En el modelo el fillable protected
     * @param StoreTourRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourRequest $request)
    {
        $validados = $request->validated();
        $tourExistente = Tour::get()->where('nombre', $validados['nombre'])->where('tipo', $validados['tipo'])->where('duracion', $validados['duracion']);
        $tipo = $validados['tipo'];

        if ($tourExistente->isEmpty()) {
            $nuevoTour = new Tour($validados);
            /* recueperar el archivo que subimos */
            $image = $request->file('imagen');
            /* Movemos a la carpeta deseada */
            if ($tipo == 'free') {
                $image->move('Img/img Freetours', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $nuevoTour->imagen = "Img/img Freetours/" . $image->getClientOriginalName();
            } elseif ($tipo == 'gastronómico') {
                $image->move('Img/Img gastronomia', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $nuevoTour->imagen = "Img/Img gastronomia/" . $image->getClientOriginalName();
            } elseif ($tipo == 'cultural') {
                $image->move('Img/Img Cultural', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos Como string */
                $nuevoTour->imagen = "Img/Img Cultural/" . $image->getClientOriginalName();
            } elseif ($tipo == 'deportivo') {
                $image->move('Img/img Deportivo', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $nuevoTour->imagen = "Img/img Deportivo/" . $image->getClientOriginalName();
            }
            $nuevoTour->save();
            return redirect()->route('crudtours')->with('success', 'Tour creado con exito');
        }
        return redirect()->route('crudtours')->with('fault', 'Tour no creado');
    }
    /**
     * Muestra datos del tour pasado como paŕametro.
     *
     * @param  \App\Models\Tour  $tour
     * @return array Devuelve los datos del tour y viaje asociado.
     */
    public function show(Tour $tour)
    {
        $viaje = Viaje::where('id', request()->input('viajes'))->first();
        return (view('sanlutour.tourindividual', [
            'tour' => $tour,
            'viaje' => $viaje,
        ]));
    }

    /**
     * Actualiza datos del tour.
     *
     * @param  \App\Http\Requests\UpdateTourRequest  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {

        //Recogo el id del tour para comprobar que si existe y cambio las propiedades de ese objeto
        Tour::findOrfail($tour->id);
        $validados = $request->validated();
        $tipo = $validados['tipo'];
        $tour->nombre = $validados['nombre'];
        $tour->descripcion = $validados['descripcion'];
        $tour->planing = $validados['planing'];
        $tour->tipo = $validados['tipo'];
        $tour->duracion = $validados['duracion'];
        $tour->precio = $validados['precio'];
        $tour->valoracion = $validados['valoracion'];
        $tour->latitud = $validados['latitud'];
        $tour->longitud = $validados['longitud'];

        if (request()->file('imagen') != null) {
            /* recueperar el archivo que subimos */
            $image = $request->file('imagen');
            /* Movemos a la carpeta deseada */
            if ($tipo == 'free') {
                $image->move('Img/img Freetours', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $tour->imagen = "Img/img Freetours/" . $image->getClientOriginalName();
            } elseif ($tipo == 'gastronómico') {
                $image->move('Img/Img gastronomia', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $tour->imagen = "Img/Img gastronomia/" . $image->getClientOriginalName();
            } elseif ($tipo == 'cultural') {
                $image->move('Img/Img Cultural', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos Como string */
                $tour->imagen = "Img/Img Cultural/" . $image->getClientOriginalName();
            } elseif ($tipo == 'deportivo') {
                $image->move('Img/img Deportivo', $image->getClientOriginalName());
                /* Lo guardamos en la base de datos como string */
                $tour->imagen = "Img/img Deportivo/" . $image->getClientOriginalName();
            }
        } else {
            $tour->imagen = $tour->imagen;
        }
        $tour->save();
        return redirect('/tours')->with('success', 'Tour actualizado con exito');
    }

    /**
     * Borra tour.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $id = $tour->id;
        DB::table('reservas')->where('tour_id', $id)->delete();
        DB::table('viajes')->where('tour_id', $id)->delete();
        DB::table('guia_tour')->where('tour_id', $id)->delete();
        Tour::find($id)->delete();
        return redirect('/tours')->with('success', 'Tour borrado con exito');
    }

    /**
     * Devuleve todos los tour de tipo freetour.
     * @return array tours free
     */
    public function freetours()
    {
        return view("sanlutour.freetours", [
            "tours" => Tour::all()->where('tipo', 'free'),
        ]);
    }
     /**
     * Devuleve todos los tour de tipo cultural.
     * @return array tours culturales
     */
    public function cultutours()
    {
        return view("sanlutour.cultutours", [
            "tours" => Tour::all()->where('tipo', 'cultural'),
        ]);
    }
     /**
     * Devuleve todos los tour de tipo deportours.
     * @return array tours deportivo
     */
    public function deportours()
    {
        return view("sanlutour.deportours", [
            "tours" => Tour::all()->where('tipo', 'deportivo'),
        ]);
    }
     /**
     * Devuleve todos los tour de tipo gastrotour.
     * @return array tours gastrnómicos
     */
    public function gastrotours()
    {
        return view("sanlutour.gastrotours", [
            "tours" => Tour::all()->where('tipo', 'gastronómico'),
        ]);
    }

    /**
     * Valora los tours calculando la valoración acumulada.
     * @param Request $request
     *
     * @return json valoración
     */
    public function valoracion(Request $request)
    {
        $id = $request->input('id');
        $valor = $request->input('valor');
        $tour = Tour::findOrfail($id);
        $tour->nombre = $tour->nombre;
        $tour->descripcion = $tour->descripcion;
        $tour->planing = $tour->planing;
        $tour->tipo = $tour->tipo;
        $tour->imagen = $tour->imagen;
        $tour->duracion = $tour->duracion;
        $tour->precio = $tour->precio;
        $tour->valoracion = $tour->valoracion + $valor;
        $tour->latitud = $tour->latitud;
        $tour->longitud = $tour->longitud;
        $tour->save();
        echo json_encode($tour->valoracion);
    }

    /**
     * Creamos comentarios cuando los usuarios tienen reservas realizadas
     * @return string mensaje
     */
    public function crearComentarios()
    {
        $validados = $this->validarComentarios();
        DB::table('comentarios')->insert([
            'nombre' => $validados['nombre'],
            'descripcion' => $validados['descripcion'],
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('reservasusuario')->with('success', 'Gracias por comentar su experiencia');
    }

    /**
     * Validación comentarios
     * @return array validados
     */
    private function validarComentarios()
    {
        $validados = request()->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        return $validados;
    }
}
