<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idadmin = Administrador::first()->user_id;
        $usuariosdiarios = User::all()->where('id','!=',$idadmin);
        return view('dashboardadmin.crudusuarios', [
            "usuarios" => $usuariosdiarios
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
    public function store(Request $request)
    {
        //
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
    public function update(User $usuario)
    {
        User::findOrfail($usuario->id);
        $validados = $this->validar();
        $id =$usuario->id;
        DB::table('users') -> where('id', $id) ->update(["name" => $validados['nombre'], 'email' => $validados['email']]);
        return redirect('/usuarios')->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $id = $usuario->id;
        DB::table('reservas')->where('user_id',$id)->delete();
        User::find($id)->delete();
        return redirect('/usuarios')->with('success','Usuario borrada con exito');
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre'=> 'required|string|max:255',
            'email'=> 'required',
        ]);

        return $validados;
    }
}
