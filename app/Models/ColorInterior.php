<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorInterior extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_color_interior';
    protected $table = 'color_interior';
    public $timestamps = false;

    public function color_interior()
    {
        return $this->hasMany(Vehiculo::class, 'id_color_interior');
    }
}
