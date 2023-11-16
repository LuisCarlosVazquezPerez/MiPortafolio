<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProyecto extends Component
{

    public $Nombre;
    public $Descripcion;
    public $Anclas;
    public $Tecnologias;
    public $Imagen;

    use WithFileUploads;

    protected $rules = [
        'Nombre' => 'required|string',
        'Descripcion' => 'required|string',
        'Anclas' => 'required|string',
        'Tecnologias' => 'regex:/^(?!.*\b(\w+)\b.*\b\1\b)(?:\b[A-Za-z]+(?:, [A-Za-z]+)*\b)+$/',
        'Imagen' => 'required'
    ];

    protected $messages = [
        'Nombre.required' => 'El campo Nombre es obligatorio.',
        'Descripcion.required' => 'El campo Descripcion es obligatorio.',
        'Anclas.required' => 'El campo Anclas es obligatorio.',
        'Tecnologias.regex' => 'El formato de Tecnologias es incorrecto. Debe ser una lista separada por comas (",") y cada palabra debe comenzar con una letra mayúscula seguida de letras minúsculas y separadas por un espacio (por ejemplo, "React, Vue").',
        'Imagen.required' => 'El campo Imagen es obligatorio.'
    ];
    
    public function crearProyecto()
    {
        $datos = $this->validate();

        //ALMACENAR LA IMAGEN
        $imagen = $this->Imagen->store('public/proyectos');
        $datos['Imagen'] = str_replace('public/proyectos/', '', $imagen);

        Proyecto::create([
            'Nombre' => $datos['Nombre'],
            'Descripcion' => $datos['Descripcion'],
            'Anclas' => $datos['Anclas'],
            'Tecnologias' => $datos['Tecnologias'],
            'Imagen' => $datos['Imagen'],
            'user_id' => auth()->user()->id
        ]);    

            $this->dispatch('creado');   
    }


    public function render()
    {
        return view('livewire.crear-proyecto');
    }
}
