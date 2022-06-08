<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Controlador para las rutas relacionadas con los guías.
 */
class GuiaController extends Controller
{
    /**
     * Vista general de todos los guías
     * @return Guia
     */
    public function guias()
    {
        return view('sanlutour.guias', [
            "guias" => Guia::all(),
        ]);
    }

    /**
     * Mostrar una lista de guías con paginación.
     *
     * @return array guias
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        return view('dashboardadmin.crudguias', [
            "guias" => Guia::paginate(3),
            "busqueda" => Guia::where('nombre', 'ilike', "%$busqueda%")->orwhere('tipo', 'ilike', "%$busqueda%")->paginate(1)
        ]);
    }

    /**
     * Crea un guía almacenandolo en la Base de datos.
     *
     * @param  \App\Http\Requests\StoreGuiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuiaRequest $request)
    {
        $validados = $request->validated();
        $guiaExistente = Guia::get()->where('nombre', $validados['nombre'])->where('tipo', $validados['tipo'])->where('tipo', $validados['tipo'])->where('descripcion', $validados['descripcion']);
        if ($guiaExistente->isEmpty()) {
            $nuevoGuia = new Guia($validados);
            $image = $request->file('imagen');
            /* Movemos a la carpeta deseada */
            $image->move('Img/guia', $image->getClientOriginalName());
            /* Lo guardamos en la base de datos como string */
            $nuevoGuia->imagen = "Img/guia/" . $image->getClientOriginalName();
            $nuevoGuia->save();
            return redirect()->route('crudguias')->with('success', 'Guia creado con exito');
        }
        return redirect()->route('crudguias')->with('fault', 'Guia no creado');
    }

    /**
     * Actualiza el guía pasado como parámetro.
     *
     * @param  \App\Http\Requests\UpdateGuiaRequest  $request
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuiaRequest $request, Guia $guia)
    {
        Guia::findOrfail($guia->id);
        $validados = $request->validated();
        $guia->nombre = $validados['nombre'];
        $guia->descripcion = $validados['descripcion'];
        $guia->tipo = $validados['tipo'];
        if (request()->file('imagen') != null) {
            /* recuperar el archivo que subimos */
            $image = $request->file('imagen');
            $image->move('Img/guia', $image->getClientOriginalName());
            /* Lo guardamos en la base de datos como string */
            $guia->imagen = "Img/guia/" . $image->getClientOriginalName();
        } else {
            $guia->imagen = $guia->imagen;
        }
        $guia->valoracion = $validados['valoracion'];
        $guia->save();
        return redirect('/guias')->with('success', 'Guia actualizado con exito');
    }

    /**
     * Borra el guía pasado como parámetro.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guia $guia)
    {
        $id = $guia->id;
        DB::table('guia_tour')->where('guia_id', $id)->delete();
        Guia::find($id)->delete();
        return redirect('/guias')->with('success', 'Guia borrado con exito');
    }

    /**
     * Calcula la valoración del guía y lo guarda en la BD.
     * @param Request $request
     *
     * @return json valoración de dicho guía.
     */
    public function valoracion(Request $request)
    {
        $id = $request->input('id');
        $valor = $request->input('valor');
        $guia = Guia::findOrfail($id);
        $guia->nombre = $guia->nombre;
        $guia->valoracion = $guia->valoracion + $valor;
        $guia->save();
        echo json_encode($guia->valoracion);
    }
}
