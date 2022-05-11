<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViajeRequest;
use App\Http\Requests\UpdateViajeRequest;
use App\Models\Tour;
use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardadmin.crudviajes', [
            "viajes" => Viaje::paginate(3)
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreViajeRequest $request)
    {
        $validados = $request->validated();
        $tourExistente = Tour::get()->where('nombre', $validados['nombre']);
        if ($tourExistente->isEmpty()){
            return redirect()->route('crudviajes')->with('fault', 'Tour no existente');
        }else{
            $nuevoViaje = new Viaje();
            $nuevoViaje->tour_id = $tourExistente->first()->id;
            $nuevoViaje->fechahora = $validados['fechahora'];
            $nuevoViaje->plazas = $validados['plazas'];
            $nuevoViaje->save();
            return redirect()->route('crudviajes')->with('success', 'Viaje creado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateViajeRequest $request, Viaje $viaje)
    {
        Viaje::findOrfail($viaje->id);
        $validados = $request->validated();
        $viaje->fechahora = $validados['fechahora'];
        $viaje->plazas = $validados['plazas'];
        $viaje->save();
        return redirect('/viajes')->with('success', 'Viaje actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viaje $viaje)
    {
        $id = $viaje->id;
        Viaje::findOrfail($viaje->id);
        Viaje::find($id)->delete();
        return redirect('/viajes')->with('success', 'Viaje borrado con exito');
    }
}
