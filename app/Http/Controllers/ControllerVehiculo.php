<?php

namespace App\Http\Controllers;

use App\Models\ColorExterior;
use App\Models\ColorInterior;
use App\Models\Estilo;
use App\Models\Imagen;
use App\Models\Marca;
use App\Models\Favorito;
use App\Models\Modelo;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerVehiculo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        $marcas = Marca::all();

        return view('vehiculos.index', compact('marcas', 'vehiculos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $estilos = Estilo::all();
        $color_exterior = ColorExterior::all();
        $color_interior = ColorInterior::all();
        $user = User::all();

        return view('vehiculos.create', compact('marcas', 'estilos', 'color_exterior', 'color_interior', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();

            $vehiculo = new Vehiculo();
            $vehiculo->id_usuario = $user->id;
            $vehiculo->id_marca = $request->input('marca');
            $vehiculo->modelo = $request->modelo;
            $vehiculo->id_estilo = $request->input('estilo');
            $vehiculo->id_color_exterior = $request->input('color_exterior');
            $vehiculo->id_color_interior = $request->input('color_interior');
            $vehiculo->transmision = $request->transmision;
            $vehiculo->cilindraje = $request->cilindraje;
            $vehiculo->combustible = $request->combustible;
            $vehiculo->recibe = intval($request->recibe);
            $vehiculo->cantidad_puertas = $request->cantidad_puertas;
            $vehiculo->año = $request->año;
            $vehiculo->precio = $request->precio;

            $vehiculo->save();

            $imagenes = Imagen::where('id_vehiculo', $vehiculo->id_vehiculo)->get();

            return redirect()->route('vehiculos.edit', ['vehiculo' => $vehiculo->id_vehiculo, 'imagenes' => $imagenes]);
        } else {
            // El usuario no está autenticado, puedes redirigirlo a una página de inicio de sesión o mostrar un mensaje de error
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para anunciar un vehículo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $vehiculo = Vehiculo::with('usuario')->find($id);
    //     $imagenes  = Imagen::where('id_vehiculo', '=', $vehiculo->id_vehiculo)->get();

    //     return view('vehiculos.show', compact('vehiculo', 'imagenes'));
    // }

    public function show($id)
    {
        $vehiculo = Vehiculo::with('usuario')->find($id);
        $imagenes = Imagen::where('id_vehiculo', '=', $vehiculo->id_vehiculo)->get();
        $user = Auth::user(); // Obtén el usuario autenticado

        return view('vehiculos.show', compact('vehiculo', 'imagenes', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marca::all();
        $estilos = Estilo::all();
        $color_exterior = ColorExterior::all();
        $color_interior = ColorInterior::all();
        $vehiculo = Vehiculo::find($id);
        $imagen = Imagen::where('id_vehiculo', '=', $vehiculo->id_vehiculo);

        return view('vehiculos.edit', compact('vehiculo', 'imagen', 'marcas', 'estilos', 'color_exterior', 'color_interior'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        $vehiculo->id_marca = $request->input('marca');
        $vehiculo->modelo = $request->modelo;
        $vehiculo->id_estilo = $request->input('estilo');
        $vehiculo->id_color_exterior = $request->input('color_exterior');
        $vehiculo->id_color_interior = $request->input('color_interior');
        $vehiculo->transmision = $request->transmision;
        $vehiculo->cilindraje = $request->cilindraje;
        $vehiculo->combustible = $request->combustible;
        $vehiculo->recibe = intval($request->recibe);
        $vehiculo->cantidad_puertas = $request->cantidad_puertas;
        $vehiculo->año = $request->año;
        $vehiculo->precio = $request->precio;

        $vehiculo->save();

        return back();
        //return redirect()->route('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        $vehiculo->delete();

        return back();
    }

    public function misVehiculos()
    {
        $user = auth()->user();
        $vehiculos = Vehiculo::with('imagenes')->where('id_usuario', $user->id)->get();

        return view('vehiculos.misVehiculos', compact('vehiculos'));
    }

    public function marcarVendido($id)
    {

        $vehiculo = Vehiculo::find($id);
        $vehiculo->vendido = 1;
        $vehiculo->save();


        return back();
    }


    public function buscar(Request $request)
    {
        $marcasSeleccionadas = $request->input('marcas');

        // Verificar si se seleccionó alguna marca
        if (!empty($marcasSeleccionadas)) {
            // Realizar la búsqueda utilizando los valores seleccionados
            $resultados = Vehiculo::whereIn('id_marca', $marcasSeleccionadas)->get();
        } else {
            // No se seleccionó ninguna marca, mostrar todos los vehículos
            $resultados = Vehiculo::all();
        }

        // Pasar los resultados a la vista resultado.blade.php
        return view('vehiculos.index', compact('resultados'));
    }


    public function misFavoritos()
    {
        $user = auth()->user();
        $favoritos = Favorito::with('vehiculo.imagenes')
            ->where('id', $user->id)
            ->get();

        $vehiculos = $favoritos->pluck('vehiculo');

        return view('vehiculos.misFavoritos', compact('vehiculos'));
    }

    public function agregarFavorito(Request $request, Vehiculo $vehiculo)
    {
        $user = auth()->user();
        $id_vehiculo = $request->input('id_vehiculo');

        $favoritoExistente = Favorito::where('id_vehiculo', $id_vehiculo)
            ->where('id', $user->id)
            ->exists();

        if ($favoritoExistente) {
            return back()->with('error', 'El vehículo ya está en favoritos.');
        }

        $favorito = new Favorito();
        $favorito->id_vehiculo = $id_vehiculo;
        $favorito->id = $user->id;
        $favorito->save();

        return back()->with('success', 'Vehículo agregado a favoritos.');
    }

    public function destroyFavorito($id)
    {
        $favorito = Favorito::where('id_vehiculo', $id)
            ->where('id', auth()->user()->id)
            ->first();

        if ($favorito) {
            $favorito->delete();
        }

        return back();
    }
}
