<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuiaController extends Controller
{
    public function guias()
    {
        return view('sanlutour.guias',[

            "guias"=> Guia::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardadmin.crudguias', [
            "guias" => Guia::paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuiaRequest $request)
    {
        /* $validados = $this->validar(); */
        $validados = $request->validated();

        $guiaExistente = Guia::get()->where('nombre', $validados['nombre'])->where('tipo', $validados['tipo'])->where('tipo', $validados['tipo'])->where('descripcion', $validados['descripcion']);
        if ($guiaExistente->isEmpty()) {
            $nuevoGuia = new Guia($validados);
            $nuevoGuia->save();
            return redirect()->route('crudguias')->with('success', 'Guia creado con exito');
        }
        return redirect()->route('crudguias')->with('fault', 'Guia no creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(Guia $guia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
        $guia->imagen = $validados['imagen'];
        $guia->valoracion = $validados['valoracion'];
        $guia->save();
        return redirect('/guias')->with('success', 'Guia actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guia $guia)
    {
        $id = $guia->id;
        DB::table('guia_tour')->where('guia_id',$id)->delete();
        Guia::find($id)->delete();
        return redirect('/guias')->with('success','Guia borrado con exito');
    }

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
