<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Controlador para los usuarios.
 */
class UserController extends Controller
{
    /**
     *  Vista de todos los usuarios con paginación.
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
     * Actualiza un usuario especifico.
     *
     * @param  User usuario
     * @return string mensaje actualizado
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
     * Borra usuario.
     *
     * @param  User usuario
     * @return string mensaje.
     */
    public function destroy(User $usuario)
    {
        $id = $usuario->id;
        DB::table('reservas')->where('user_id',$id)->delete();
        User::find($id)->delete();
        return redirect('/usuarios')->with('success','Usuario borrada con exito');
    }

    /**
     * Valida campos usuario.
     * @return array validados
     */
    private function validar()
    {
        $validados = request()->validate([
            'nombre'=> 'required|string|max:255',
            'email'=> 'required',
        ]);

        return $validados;
    }
}
