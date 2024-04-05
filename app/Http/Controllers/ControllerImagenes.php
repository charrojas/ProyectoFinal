<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerImagenes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();

        return view('imagenes.index', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (auth()->check()) {
            // El usuario está autenticado, permite el acceso a la página de creación
            return view('vehiculos.create');
        } else {
            // El usuario no está autenticado, redirige a otra página
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagenes.*' => 'required|image|mimes:jpg,jpeg,png',
            'id_vehiculo' => 'required|integer',
        ]);

        $imagenes = $request->file('imagenes');

        foreach ($imagenes as $imagen) {
            $ruta = public_path('uploads');
            $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move($ruta, $nombreArchivo);

            $imagenModel = new Imagen();
            $imagenModel->id_vehiculo = $request->input('id_vehiculo');
            $imagenModel->imagen_url = '/uploads/' . $nombreArchivo;
            $imagenModel->save();
        }

        $imagenesActualizadas = Imagen::where('id_vehiculo', $request->input('id_vehiculo'))->get();

        // return redirect()->route('vehiculos.edit', ['vehiculo' => $request->input('id_vehiculo')])
        //     ->with('success', 'Imágenes cargadas exitosamente.')
        //     ->with('imagenes', $imagenesActualizadas);
        return back();
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
        // Obtener el vehículo y sus imágenes asociadas
        $vehiculo = Vehiculo::findOrFail($id);
        $imagenes = Imagen::where('id_vehiculo', $id)->get();

        // Resto del código...

        // Pasar el vehículo y las imágenes a la vista
        return view('vehiculos.edit', compact('vehiculo', 'imagenes'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id);

        // Obtener la ruta de la imagen
        $rutaImagen = public_path($imagen->imagen_url);

        // Verificar si el archivo existe antes de eliminarlo
        if (file_exists($rutaImagen)) {
            // Eliminar la imagen del directorio
            unlink($rutaImagen);
        }

        $imagen->delete();

        return back();
    }
}
