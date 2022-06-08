<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Ruta para enviar correos recibiendo los datos del formulatio de contacto.
     * LLamo a la clase TestMail App/Mail
     * @param string contenido del formulario de contacto
     */
    public function sendEmail(Request $request)
    {
        $detalles=[
            'title' => 'Correo de Contacto de Sanlutours',
            'nombre' => $request->input('nombre'),
            'apellido'=> $request->input('apellido'),
            'email'=> $request->input('email'),
            'body'=>$request->input('textarea')
        ];
        Mail::to('sanlutours@gmail.com')->send(new TestMail($detalles));
        return redirect()->route('contacto')->with('success','Email enviado correctamente, Gracias por su amabilidad.');
    }
}
