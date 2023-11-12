<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarProyecto extends Component
{
    protected $listeners = ['eliminarProyecto'];

    public $buscar = '';
    public $ordenar = 'asc';

    public $tecnologiaSeleccionada = '';
    public $tecnologiasDisponibles = [];

    public function mount()
    {
        $tecnologiasUnicas = Proyecto::distinct('Tecnologias')->pluck('Tecnologias')->flatMap(function ($tecnologias) {
            return explode(', ', $tecnologias);
        })->unique()->values()->all();

        $this->tecnologiasDisponibles = $tecnologiasUnicas;
    }


    public function eliminarProyecto(Proyecto $proyecto)
    {
        if ($proyecto->Imagen) {
            Storage::delete('public/proyectos/' . $proyecto->Imagen);
        }

        $proyecto->delete();
        return redirect(request()->header('Referer'));
    }

    public function Ordenar()
    {
        $this->ordenar = ($this->ordenar == 'asc') ? 'desc' : 'asc';
    }


    public function render()
    {

        $proyectos = Proyecto::query();

        if (!empty($this->buscar)) {
            $proyectos->where(function ($q) {
                $q->where('Nombre', 'like', '%' . $this->buscar . '%')
                    ->orWhere('Tecnologias', 'like', '%' . $this->buscar . '%');
            });
        }

        if (!empty($this->tecnologiaSeleccionada)) {
            $proyectos->where('Tecnologias', 'like', '%' . $this->tecnologiaSeleccionada . '%');
        }

        $proyectos = $proyectos->orderBy('Nombre', $this->ordenar)->get();

        return view('livewire.mostrar-proyecto', [
            'proyectos' => $proyectos,
        ]);
    }
}
