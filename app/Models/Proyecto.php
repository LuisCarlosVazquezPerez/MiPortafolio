<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Anclas',
        'Tecnologias',
        'Imagen',
        'user_id',
        'Github',
    ];
}
