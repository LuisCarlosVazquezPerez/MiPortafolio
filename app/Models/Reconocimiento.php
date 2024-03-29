<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'Titulo',
        'Empresa',
        'Tecnologias',
        'Pdf',
        'user_id',
        'Fecha',
    ];
}
