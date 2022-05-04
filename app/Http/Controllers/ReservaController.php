<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardadmin.crudreservas', [
            "reservas" => Reserva::paginate(1)
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
     * @param  \App\Http\Requests\StoreReservaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservaRequest $request)
    {
        $validados = $request->validated();
        $userid = User::where('name',$validados['user_id'])->first()->id;
        $tourid = Tour::where('nombre',$validados['tour_id'])->first()->id;
        $reservaExistente = Reserva::get()->where('numpersonas', $validados['numpersonas'])->where('fechahora', $validados['fechahora'])->where('user_id', $userid)->where('tour_id', $tourid);
        if ($reservaExistente->isEmpty()) {
            $nuevoreserva = new Reserva();
            $nuevoreserva->numpersonas = $validados['numpersonas'];
            $nuevoreserva->fechahora = $validados['fechahora'];
            $nuevoreserva->user_id = $userid;
            $nuevoreserva->tour_id = $tourid;
            $nuevoreserva->save();
            return redirect()->route('crudreservas')->with('success', 'Reserva creada con exito');
        }
        return redirect()->route('crudreservas')->with('fault', 'Reserva no creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservaRequest  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {

        Reserva::findOrfail($reserva->id);
        $validados = $request->validated();
        $userid = User::where('name',$validados['user_id'])->first()->id;
        $tourid = Tour::where('nombre',$validados['tour_id'])->first()->id;
        $reserva->numpersonas = $validados['numpersonas'];
        $reserva->fechahora = $validados['fechahora'];
        $reserva->user_id = $userid;
        $reserva->tour_id = $tourid;
        $reserva->save();
        if(Auth::user()->administrador != null){
           return redirect()->route('crudreservas')->with('success', 'Reserva actualizado con exito');
        }else{
            return redirect()->route('reservasusuario')->with('success', 'Reserva actualizado con exito');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        $id = $reserva->id;
        Reserva::find($id)->delete();
        if(Auth::user()->administrador != null){
            return redirect()->route('crudreservas')->with('success','Reserva borrada con exito');
         }else{
             return redirect()->route('reservasusuario')->with('success','Reserva borrada con exito');
         }

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexusuario()
    {
        /* dd(Auth::user()->reservas); */
        return view('dashboardusuario.reservausuario', [
            "reservas" => Auth::user()->reservas,
        ]);
    }

    public function tramitar(Tour $tour)
    {
        Tour::findOrfail($tour->id);
        $validado = $this->validar();
        $plazasReservadas = $validado['numpersonas'];
        $viaje = request()->input('viaje');

        return view('sanlutour.tramite',[
            "tour"=>$tour,
            "plazasreservadas"=>$plazasReservadas,
            "viaje"=>json_decode($viaje),
        ]);
    }

    private function validar()
    {
        $validados = request()->validate([
            'numpersonas'=> 'required|integer',
            /* 'fechahora'=> 'required',
            'precio'=> 'required|numeric',
            'duracion'=> 'required', */
        ]);

        return $validados;
    }




}
