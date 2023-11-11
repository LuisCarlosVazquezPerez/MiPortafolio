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
    public $Descripcion;
    public $Anclas;
    public $Tecnologias;
    public $Imagen;
    public $Imagen_Nueva;

    use WithFileUploads;

    protected $rules = [
        'Nombre' => 'required|string',
        'Descripcion' => 'required|string',
        'Anclas' => 'required|string',
        'Tecnologias' => 'required|string',
        'Imagen_Nueva' => 'nullable|image'
    ];

  
    public function mount(Proyecto $proyectos)
    {
        $this->proyecto_id = $proyectos->id;
        $this->Nombre = $proyectos->Nombre;
        $this->Descripcion = $proyectos->Descripcion;
        $this->Anclas = $proyectos->Anclas;
        $this->Tecnologias = $proyectos->Tecnologias;
        $this->Imagen = $proyectos->Imagen;
    }

    public function actualizarVacante(){
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
