<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Controlador para las rutas relacionadas con las reservas.
 */
class ReservaController extends Controller
{
    /**
     * Vista de todos las reservas con paginación.
     *
     * @return array reservas
     */
    public function index()
    {
        return view('dashboardadmin.crudreservas', [
            "reservas" => Reserva::paginate(1)
        ]);
    }

    /**
     * Crea una nueva reserva.
     *
     * @param  \App\Http\Requests\StoreReservaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservaRequest $request)
    {
        $validados = $request->validated();
        $userid = User::where('name', $validados['user_id'])->first();
        $tourid = Tour::where('nombre', $validados['tour_id'])->first();
        if ($userid == null) {
            return redirect()->route('crudreservas')->with('fault', 'Reserva no creada, usuario incorrecto');
        } elseif ($tourid == null) {
            return redirect()->route('crudreservas')->with('fault', 'Reserva no creada, tour incorrecto');
        } else {
            $userid = $userid->id();
            $tourid = $tourid->id();
        }
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
     * Actualiza reserva.
     *
     * @param  \App\Http\Requests\UpdateReservaRequest  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        Reserva::findOrfail($reserva->id);
        $validados = $request->validated();
        $userid = User::where('name', $validados['user_id'])->first()->id;
        $tourid = Tour::where('nombre', $validados['tour_id'])->first()->id;
        $reserva->numpersonas = $validados['numpersonas'];
        $reserva->fechahora = $validados['fechahora'];
        $reserva->user_id = $userid;
        $reserva->tour_id = $tourid;
        $reserva->save();
        if (Auth::user()->administrador != null) {
            return redirect()->route('crudreservas')->with('success', 'Reserva actualizado con exito');
        } else {
            return redirect()->route('reservasusuario')->with('success', 'Reserva actualizado con exito');
        }
    }

    /**
     *Borra reserva.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        $id = $reserva->id;
        Reserva::find($id)->delete();
        if (Auth::user()->administrador != null) {
            return redirect()->route('crudreservas')->with('success', 'Reserva borrada con exito');
        } else {
            return redirect()->route('reservasusuario')->with('success', 'Reserva borrada con exito');
        }
    }

    /**
     * Devuelve l as reservas del usuario logueado.
     *
     * @return array reservas
     */
    public function indexusuario()
    {
        return view('dashboardusuario.reservausuario', [
            "reservas" => Auth::user()->reservas,
        ]);
    }

    /**
     * Tramita reserva.
     * @param Tour $tour
     *
     * @return array devuelve datos necesarios para la reserva de dicho tour.
     */
    public function tramitar(Tour $tour)
    {
        Tour::findOrfail($tour->id);
        $validado = $this->validar();
        $plazasReservadas = $validado['numpersonas'];
        $viaje = request()->input('viaje');

        return view('sanlutour.tramite', [
            "tour" => $tour,
            "plazasreservadas" => $plazasReservadas,
            "viaje" => json_decode($viaje),
        ]);
    }

    /**
     * Valida campos de reservas.
     * @return array validados.
     */
    private function validar()
    {
        $validados = request()->validate([
            'numpersonas' => 'required|integer',
        ]);
        return $validados;
    }
}
