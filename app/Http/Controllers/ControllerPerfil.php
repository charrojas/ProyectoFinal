<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerPerfil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); 
        $perfil = $user->perfil; 
    
       
        return view('usuario.perfil', compact('perfil'));
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
    public function edit(string $id)
    {
        $perfil = User::findOrFail($id);

        return view('usuario.edit', compact('perfil'));
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
        $perfil = User::find($id);

        $perfil->name = $request->input('name');
        $perfil->telefono = $request->input('telefono');
        $perfil->direccion = $request->input('direccion');
       

        $perfil->save();

        return redirect()->back();

        // echo $perfil;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    
        return redirect()->route('paginas.index');
    }

    public function editP(string $id)
    {
        $perfil = User::findOrFail($id);

        return view('usuario.edit', compact('perfil'));
    }

    
    public function updateP(Request $request, $id)
    {
        $perfil = User::find($id);

        $request->validate([
            'name' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $perfil->name = $request->input('name');
        $perfil->telefono = $request->input('telefono');
        $perfil->direccion = $request->input('direccion');
       

        $perfil->save();

        // return redirect()->route('usuario.perfil');

        return $id;
    }

}
