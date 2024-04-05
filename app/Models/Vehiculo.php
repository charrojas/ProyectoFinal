<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vehiculo extends Model
{
    protected $primaryKey = 'id_vehiculo';
    protected $table = 'vehiculos';
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_vehiculo');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'id_modelo');
    }

    public function estilo()
    {
        return $this->belongsTo(Estilo::class, 'id_estilo');
    }

    public function colorExterior()
    {
        return $this->belongsTo(ColorExterior::class, 'id_color_exterior');
    }

    public function colorInterior()
    {
        return $this->belongsTo(ColorInterior::class, 'id_color_interior');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_vehiculo');
    }

    
    public function mostrarVehiculo($id)
    {
        $vehiculo = Vehiculo::with('imagenes')->findOrFail($id);
        return view('vehiculos.show', compact('vehiculo'));
    }




}
