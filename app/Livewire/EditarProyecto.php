<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarProyecto extends Component
{
    public $proyecto_id;
    public $Nombre;
    public $Github;
    public $Descripcion;
    public $Anclas;
    public $Tecnologias;
    public $Imagen;
    public $Imagen_Nueva;

    use WithFileUploads;

    protected $rules = [
        'Nombre' => 'required|string',
        'Github' => 'required|string',
        'Descripcion' => 'required|string',
        'Anclas' => 'required|string',
        'Tecnologias' => 'regex:/^(?!.*\b(\w+)\b.*\b\1\b)(?:\b[A-Za-z]+(?:, [A-Za-z]+)*\b)+$/',
        'Imagen_Nueva' => 'nullable|image'
    ];

    protected $messages = [
        'Nombre.required' => 'El campo Nombre es obligatorio.',
        'Github.required' => 'El campo Github es obligatorio.',
        'Nombre.string' => 'El campo Nombre debe ser una cadena de caracteres.',
        'Descripcion.required' => 'El campo Descripcion es obligatorio.',
        'Descripcion.string' => 'El campo Descripcion debe ser una cadena de caracteres.',
        'Anclas.required' => 'El campo Anclas es obligatorio.',
        'Anclas.string' => 'El campo Anclas debe ser una cadena de caracteres.',
        'Tecnologias.regex' => 'El formato de Tecnologias es incorrecto. Debe ser una lista separada por comas (",") y cada palabra debe comenzar con una letra mayúscula seguida de letras minúsculas y separadas por un espacio (por ejemplo, "React, Vue").',
        'Imagen_Nueva.image' => 'El archivo debe ser una imagen.',
        'Imagen_Nueva.nullable' => 'El campo Imagen Nueva debe ser una imagen válida.'
    ];
    

    public function mount(Proyecto $proyectos)
    {
        $this->proyecto_id = $proyectos->id;
        $this->Nombre = $proyectos->Nombre;
        $this->Descripcion = $proyectos->Descripcion;
        $this->Anclas = $proyectos->Anclas;
        $this->Tecnologias = $proyectos->Tecnologias;
        $this->Imagen = $proyectos->Imagen;
        $this->Github = $proyectos->Github;
    }

    public function actualizarProyecto(){
        $datos = $this->validate();

        $eliminarImagen = Proyecto::find($this->proyecto_id);

        //!SI HAY UNA IMAGEN NUEVA!!
        if($this->Imagen_Nueva){
            $Imagen = $this->Imagen_Nueva->store('public/proyectos');
            $datos['Imagen'] = str_replace('public/proyectos/','',$Imagen);
            Storage::delete('public/proyectos/'.$eliminarImagen->Imagen);
        }

        $proyecto = Proyecto::find($this->proyecto_id);
        $proyecto->Nombre = $datos['Nombre'];
        $proyecto->Github = $datos['Github'];
        $proyecto->Descripcion = $datos['Descripcion'];
        $proyecto->Anclas = $datos['Anclas'];
        $proyecto->Tecnologias = $datos['Tecnologias'];
        $proyecto->Imagen = $datos['Imagen'] ?? $proyecto->Imagen;
        
        $proyecto->save();
  
        return redirect()->route('proyectos.create')->with('mensaje', 'Se actualizo correctamente!');
    }

    public function render()
    {
        $proyectos = Proyecto::all();
        return view('livewire.editar-proyecto',[
            'proyectos'=> $proyectos
        ]);
    }
}
