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
        'Tecnologias' => 'required|string',
        'Imagen' => 'required'
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
