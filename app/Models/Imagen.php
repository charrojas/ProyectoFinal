<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'id_imagen';
    protected $table = 'imagenes';
    public $timestamps = false;

    public function vehiculo()
{
    return $this->belongsTo(Vehiculo::class, 'id_vehiculo');
}
}
