<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estilo';
    protected $table = 'estilos';
    public $timestamps = false;

    public function estilo()
    {
        return $this->belongsTo(Estilo::class, 'id_estilo');
    }
}
