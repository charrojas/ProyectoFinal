<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvioMail extends Model
{
        protected $fillable = [
            'email',
            'provider_id',
        ];
    }

