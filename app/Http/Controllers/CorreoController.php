<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\CorreoComprador;
use App\Mail\CorreoVendedor;
use App\Mail\EnviarCorreoPropietario;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{

    public function enviarCorreo(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        $correoRemitente = $request->input('email');

        Mail::mailer('second')->to('char@ucr-ays.net')->send(new ContactFormMail($data, $correoRemitente));
        
        return redirect()->back()->with('success', 'El correo ha sido enviado');
    }



    public function mostrarEnviarCorreo($id)
    {
        $vehiculo = Vehiculo::with('usuario')->find($id);
        $user = Auth::user();

        return view('vehiculos.emailFicha', compact('vehiculo', 'user'));
    }

    public function enviarCorreoPropietario(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ];

        $vehiculo = Vehiculo::find($request->input('id_vehiculo'));

        if (!$vehiculo) {
            return redirect()->back()->with('error', 'El vehículo no existe');
        }

        $propietario = $vehiculo->usuario;

        if (!$propietario) {
            return redirect()->back()->with('error', 'El propietario del vehículo no existe');
        }

        if (!$propietario->email) {
            return redirect()->back()->with('error', 'El propietario del vehículo no tiene una dirección de correo electrónico');
        }

        Mail::to($propietario->email)->send(new EnviarCorreoPropietario($data));

        return redirect()->back()->with('success', 'El correo ha sido enviado al propietario del vehículo');
    }
    
}
