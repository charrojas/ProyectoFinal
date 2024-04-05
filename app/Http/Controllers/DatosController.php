<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DatosController extends Controller
{
    public function guardarInformacion(Request $request)

    {
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $providerId = $request->input('provider_id');

        $user = User::where('provider_id', $providerId)->first();

        if ($user) {
            $user->telefono = $telefono;
            $user->direccion = $direccion;
            $user->save();


            return redirect('paginas')->with('success', 'Información guardada exitosamente.');
        } else {
            return redirect('/login')->with('error', 'Usuario no encontrado.');
        }
    }
}
