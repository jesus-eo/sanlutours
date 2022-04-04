<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Models\Tour;
use Illuminate\Http\Request;
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTourRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTourRequest  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }

    public function freetours($orden = "")
    {
        if($orden == 'precio'){
            return view("sanlutour.freetours",[
                "tours"=>Tour::where('tipo','free')->orderBy('precio','asc')->get(),
            ]);
        }else if($orden == 'fecha'){
            return view("sanlutour.freetours",[
                "tours"=>Tour::where('tipo','free')->orderBy('fechahora','asc')->get(),
            ]);
        }else if($orden == 'duracion'){
            return view("sanlutour.freetours",[
                "tours"=>Tour::where('tipo','free')->orderBy('duracion','asc')->get(),
            ]);
        }else {
            return view("sanlutour.freetours",[
                "tours"=> Tour::all()->where('tipo','free'),]);
        }

    }

    public function cultutours($orden = "")
    {
        if($orden == 'precio'){
            return view("sanlutour.cultutours",[
                "tours"=>Tour::where('tipo','cultural')->orderBy('precio','asc')->get(),
            ]);
        }else if($orden == 'fecha'){
            return view("sanlutour.cultutours",[
                "tours"=>Tour::where('tipo','cultural')->orderBy('fechahora','asc')->get(),
            ]);
        }else if($orden == 'duracion'){
            return view("sanlutour.cultutours",[
                "tours"=>Tour::where('tipo','cultural')->orderBy('duracion','asc')->get(),
            ]);
        }else {
            return view("sanlutour.cultutours",[
                "tours"=> Tour::all()->where('tipo','cultural'),]);
        }

    }

    public function deportours($orden = "")
    {
        if($orden == 'precio'){
            return view("sanlutour.deportours",[
                "tours"=>Tour::where('tipo','deportivo')->orderBy('precio','asc')->get(),
            ]);
        }else if($orden == 'fecha'){
            return view("sanlutour.deportours",[
                "tours"=>Tour::where('tipo','deportivo')->orderBy('fechahora','asc')->get(),
            ]);
        }else if($orden == 'duracion'){
            return view("sanlutour.deportours",[
                "tours"=>Tour::where('tipo','deportivo')->orderBy('duracion','asc')->get(),
            ]);
        }else {
            return view("sanlutour.deportours",[
                "tours"=> Tour::all()->where('tipo','deportivo'),]);
        }

    }

    public function gastrotours($orden = "")
    {
        if($orden == 'precio'){
            return view("sanlutour.gastrotours",[
                "tours"=>Tour::where('tipo','gastronomico')->orderBy('precio','asc')->get(),
            ]);
        }else if($orden == 'fecha'){
            return view("sanlutour.gastrotours",[
                "tours"=>Tour::where('tipo','gastronomico')->orderBy('fechahora','asc')->get(),
            ]);
        }else if($orden == 'duracion'){
            return view("sanlutour.gastrotours",[
                "tours"=>Tour::where('tipo','gastronomico')->orderBy('duracion','asc')->get(),
            ]);
        }else {
            return view("sanlutour.gastrotours",[
                "tours"=> Tour::all()->where('tipo','gastronomico'),]);
        }

    }

    public function valoracion(Request $request)
    {
        $id = $request->input('id');
        $valor = $request->input('valor');
        $tour = Tour::findOrfail($id);
        $tour->nombre = $tour->nombre;
        $tour->descripcion = $tour->descripcion;
        $tour->planing = $tour->planing;
        $tour->fechahora = $tour->fechahora;
        $tour->plazas = $tour->plazas;
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


    public function ordenar($orden){
        if($orden == 'precio'){
            return view("sanlutour.freetours",[
                "tours"=>Tour::where('tipo','free')->orderBy('precio','asc')->get(),
            ]);
        }else if($orden == 'fecha'){
            return view("sanlutour.freetours",[
                "tours"=>Tour::where('tipo','free')->orderBy('duracion','asc')->get(),
            ]);
        }

    }
}


