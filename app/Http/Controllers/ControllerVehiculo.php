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
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;


//use Barryvdh\DomPDF\Facade\Pdf;

class ControllerVehiculo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('vendido', 0)->simplePaginate(10); //obtener los no vendidos
        $marcas = Marca::all();
        $color_exterior = COlorExterior::all();
        $color_interior = ColorInterior::all();
        $estilos = Estilo::all();

        return view('vehiculos.index', compact('marcas', 'vehiculos', 'color_exterior', 'color_interior', 'estilos'));
    }


    // public function generarPDF($id)
    // {
    //     $vehiculo = Vehiculo::find($id);
    //     $imagenes = Imagen::where('id_vehiculo', $vehiculo->id_vehiculo)->get();

    //     $pdf = PDF::loadView('vehiculos.fichaPDF', compact('vehiculo', 'imagenes'));
    //     return $pdf->download('fichaVehiculo.pdf');
    // }


    public function generarPDF($id)
    {
        $vehiculo = Vehiculo::find($id);
        $imagenes = $vehiculo->imagenes;
    
        $pdf = PDF::loadView('vehiculos.fichaPDF', compact('vehiculo', 'imagenes'));
        return $pdf->download('fichaVehiculo.pdf');
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
            $vehiculo->vendido = 0;
            $vehiculo->fecha_ingreso_sistema = date('Y-m-d');

            $vehiculo->save();

            $imagenes = Imagen::where('id_vehiculo', $vehiculo->id_vehiculo)->get();

            return redirect()->route('vehiculos.edit', ['vehiculo' => $vehiculo->id_vehiculo, 'imagenes' => $imagenes]);
        } else {
           return redirect()->route('login')->with('error', 'Debes iniciar sesión para anunciar un vehículo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::with('usuario')->find($id);
        $imagenes  = Imagen::where('id_vehiculo', '=', $vehiculo->id_vehiculo)->get();
        $modelo = $vehiculo->modelo;
        $vehiculosRelacionados = Vehiculo::with('imagenes')
            ->where('modelo', $modelo)
            ->where('id_vehiculo', '!=', $id)
            ->limit(3)
            ->get();

        return view('vehiculos.show', compact('vehiculo', 'imagenes', 'vehiculosRelacionados'));
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

        if (!empty($marcasSeleccionadas)) {
            $resultados = Vehiculo::whereIn('id_marca', $marcasSeleccionadas)->get();
        } else {
            $resultados = Vehiculo::all();
        }
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

    /**
     * Filtra los vehículos según los criterios de búsqueda especificados por el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function filtrarVehiculos(Request $request)
    {

        $marcas = Marca::all();
        $color_exterior = COlorExterior::all();
        $color_interior = ColorInterior::all();
        $estilos = Estilo::all();
        
        // Validar los campos de filtrado
        $validatedData = $request->validate([
            'id_marca' => 'nullable|integer',
            'modelo' => 'nullable',
            'id_estilo' => 'nullable|integer',
            'id_color_exterior' => 'nullable|integer',
            'id_color_interior' => 'nullable|integer',
            'tipo_combustible' => 'nullable|in:opcion1,opcion2,opcion3,opcion4',
            'transmision' => 'nullable|in:opcion1,opcion2',
            'num_puertas' => 'nullable|in:opcion1,opcion2,opcion3',
            'cilindraje' => 'nullable|numeric',
            'recibe' => 'nullable|boolean',
            'año_inicio' => 'nullable|integer',
            'año_fin' => 'nullable|integer',
            'precio_inicio' => 'nullable',
            'precio_fin' => 'nullable',
            'orden' => 'nullable|in:opcion1,opcion2'
        ]);

        session()->put('filtro_id_marca', $validatedData['id_marca'] ?? null);
        session()->put('filtro_modelo', $validatedData['modelo'] ?? null);
        session()->put('filtro_id_estilo', $validatedData['id_estilo'] ?? null);
        session()->put('filtro_id_color_exterior', $validatedData['id_color_exterior'] ?? null);
        session()->put('filtro_id_color_interior', $validatedData['id_color_interior'] ?? null);
        session()->put('filtro_tipo_combustible', $validatedData['tipo_combustible'] ?? null);
        session()->put('filtro_transmision', $validatedData['transmision'] ?? null);
        session()->put('filtro_num_puertas', $validatedData['num_puertas'] ?? null);
        session()->put('filtro_cilindraje', $validatedData['cilindraje'] ?? null);
        session()->put('filtro_recibe', $validatedData['recibe'] ?? null);
        session()->put('filtro_año_inicio', $validatedData['año_inicio'] ?? null);
        session()->put('filtro_año_fin', $validatedData['año_fin'] ?? null);
        session()->put('filtro_precio_inicio', $validatedData['precio_inicio'] ?? null);
        session()->put('filtro_precio_fin', $validatedData['precio_fin'] ?? null);

        $orden = $validatedData['orden'] ?? null;
        session()->put('filtro_orden', $orden);


        $vehiculos = Vehiculo::where('vendido', 0);


        if (isset($validatedData['id_marca'])) {
            session()->put('filtro_id_marca', $validatedData['id_marca']);
            $vehiculos = $vehiculos->where('id_marca', $validatedData['id_marca']);
        }

        if (isset($validatedData['modelo'])) {
            session()->put('filtro_modelo', $validatedData['modelo']);
            $vehiculos = $vehiculos->where('modelo', $validatedData['modelo']);
        }

        if (isset($validatedData['id_estilo'])) {
            session()->put('filtro_id_estilo', $validatedData['id_estilo']);
            $vehiculos = $vehiculos->where('id_estilo', $validatedData['id_estilo']);
        }

        if (isset($validatedData['id_color_exterior'])) {
            session()->put('filtro_id_color_exterior', $validatedData['id_color_exterior']);
            $vehiculos = $vehiculos->where('id_color_exterior', $validatedData['id_color_exterior']);
        }

        if (isset($validatedData['id_color_interior'])) {
            session()->put('filtro_id_color_interior', $validatedData['id_color_interior']);
            $vehiculos = $vehiculos->where('id_color_interior', $validatedData['id_color_interior']);
        }

        if (isset($validatedData['tipo_combustible'])) {
            session()->put('filtro_tipo_combustible', $validatedData['tipo_combustible']);
            $opcion = $validatedData['tipo_combustible'];
            if ($opcion === 'opcion1') {
                $vehiculos = $vehiculos->where('combustible', 'Diesel');
            } elseif ($opcion === 'opcion2') {
                $vehiculos = $vehiculos->where('combustible', 'Gasolina');
            } elseif ($opcion === 'opcion3') {
                $vehiculos = $vehiculos->where('combustible', 'Eléctrico');
            } elseif ($opcion === 'opcion4') {
                $vehiculos = $vehiculos->where('combustible', 'Híbrido');
            }
        }

        if (isset($validatedData['transmision'])) {
            session()->put('filtro_transmision', $validatedData['transmision']);
            $opcion = $validatedData['transmision'];
            if ($opcion === 'opcion1') {
                $vehiculos = $vehiculos->where('transmision', 'Automatica');
            } elseif ($opcion === 'opcion2') {
                $vehiculos = $vehiculos->where('transmision', 'Manual');
            }
        }

        if (isset($validatedData['num_puertas'])) {
            session()->put('filtro_num_puertas', $validatedData['num_puertas']);
            $opcion = $validatedData['num_puertas'];
            if ($opcion === 'opcion1') {
                $vehiculos = $vehiculos->where('cantidad_puertas', 2);
            } elseif ($opcion === 'opcion2') {
                $vehiculos = $vehiculos->where('cantidad_puertas', 3);
            } elseif ($opcion === 'opcion3') {
                $vehiculos = $vehiculos->where('cantidad_puertas', 4);
            }
        }

        if (isset($validatedData['cilindraje'])) {
            session()->put('filtro_cilindraje', $validatedData['cilindraje']);
            $vehiculos = $vehiculos->where('cilindraje', $validatedData['cilindraje']);
        }

        if (isset($validatedData['recibe'])) {
            session()->put('filtro_recibe', $validatedData['recibe']);
            $vehiculos = $vehiculos->where('recibe', $validatedData['recibe']);
        }

        if (isset($validatedData['año_inicio'], $validatedData['año_fin'])) {
            session()->put('filtro_año_inicio', $validatedData['año_inicio']);
            session()->put('filtro_año_fin', $validatedData['año_fin']);
            $añoInicio = $validatedData['año_inicio'];
            $añoFin = $validatedData['año_fin'];
            $vehiculos = $vehiculos->whereBetween('año', [$añoInicio, $añoFin]);
        } elseif (isset($validatedData['año'])) {
            session()->put('filtro_año_inicio', $validatedData['año']);
            session()->forget('filtro_año_fin');
            $vehiculos = $vehiculos->where('año', '>=', $validatedData['año']);
        }

        if (isset($validatedData['precio_inicio'], $validatedData['precio_fin'])) {
            session()->put('filtro_precio_inicio', $validatedData['precio_inicio']);
            session()->put('filtro_precio_fin', $validatedData['precio_fin']);
            $precioInicio = $validatedData['precio_inicio'];
            $precioFin = $validatedData['precio_fin'];
            $vehiculos = $vehiculos->whereBetween('precio', [$precioInicio, $precioFin]);
        } elseif (isset($validatedData['precio'])) {
            session()->put('filtro_precio_inicio', $validatedData['precio']);
            session()->forget('filtro_precio_fin');
            $vehiculos = $vehiculos->where('precio', '>=', $validatedData['precio']);
        }

        if (isset($validatedData['orden'])) {
            session()->put('filtro_orden', $validatedData['orden']);
            $opcion = $validatedData['orden'];
            if ($opcion === 'opcion1') {
                $vehiculos = $vehiculos->orderBy('precio', 'asc');
            } elseif ($opcion === 'opcion2') {
                $vehiculos = $vehiculos->orderBy('año', 'desc');
            }
        }

        $vehiculos = $vehiculos->simplePaginate(10);
        return view('vehiculos.index', compact('vehiculos', 'marcas', 'color_exterior', 'color_interior', 'estilos'));
    }


}


