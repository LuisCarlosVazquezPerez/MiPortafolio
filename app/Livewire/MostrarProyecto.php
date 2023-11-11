<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarProyecto extends Component
{

    protected $listeners = ['eliminarProyecto'];

    public function eliminarProyecto(Proyecto $proyecto){
        if( $proyecto->Imagen ) {
            Storage::delete('public/proyectos/' . $proyecto->Imagen);            
        } 

        $proyecto->delete();
        return redirect(request()->header('Referer'));
    }


    public function render()
    {
        $proyectos = Proyecto::all();
        return view('livewire.mostrar-proyecto',[
            'proyectos'=> $proyectos,
        ]);
    }
}
