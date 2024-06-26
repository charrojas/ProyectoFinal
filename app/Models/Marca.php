<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_marca';
    protected $table = 'marcas';
    public $timestamps = false;

    public function marca()
{
    return $this->belongsTo(Vehiculo::class, 'id_estilo');
}

}
