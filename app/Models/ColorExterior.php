<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorExterior extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_color_exterior';
    protected $table = 'color_exterior';
    public $timestamps = false;

    public function color_exterior()
    {
        return $this->hasMany(Vehiculo::class, 'id_color_exterior');
    }

}
