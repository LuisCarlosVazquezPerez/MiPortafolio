<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Livewire\Component;

class MostrarPro extends Component
{

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



    public function Ordenar()
    {
        $this->ordenar = ($this->ordenar == 'asc') ? 'desc' : 'asc';
    }

    public function render()
    {

        $query = Proyecto::query();

        if (!empty($this->buscar)) {
            $query->where(function ($q) {
                $q->where('Tecnologias', 'like', '%' . $this->buscar . '%')
                    ->orWhere('Nombre', 'like', '%' . $this->buscar . '%');
            });
        }

        if (!empty($this->tecnologiaSeleccionada)) {
            $query->where('Tecnologias', 'like', '%' . $this->tecnologiaSeleccionada . '%');
        }

        $proyectos = $query->orderBy('Nombre', $this->ordenar)->get();

        
        return view('livewire.mostrar-pro',[
            'proyectos' => $proyectos
        ]);
    }
}
