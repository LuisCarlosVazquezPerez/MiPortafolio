<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Livewire\Component;

class MostrarReco extends Component
{

    public $buscar = '';
    public $ordenar = 'desc';
    public $tecnologiaSeleccionada = '';
    public $tecnologiasDisponibles = [];

    public function mount()
    {
        $tecnologiasUnicas = Reconocimiento::distinct('Tecnologias')->pluck('Tecnologias')->flatMap(function ($tecnologias) {
            return explode(', ', $tecnologias);
        })->unique()->values()->all();

        $this->tecnologiasDisponibles = $tecnologiasUnicas;
    }



    public function Ordenar()
    {
        $this->ordenar = ($this->ordenar == 'desc') ? 'asc' : 'desc';
    }


    public function render()
    {
        $query = Reconocimiento::query();

        if (!empty($this->buscar)) {
            $query->where(function ($q) {
                $q->where('Tecnologias', 'like', '%' . $this->buscar . '%')
                    ->orWhere('Empresa', 'like', '%' . $this->buscar . '%');
            });
        }

        if (!empty($this->tecnologiaSeleccionada)) {
            $query->where('Tecnologias', 'like', '%' . $this->tecnologiaSeleccionada . '%');
        }

        $reconocimientos = $query->orderBy('Fecha', $this->ordenar)->get();

        return view('livewire.mostrar-reco', [
            'reconocimientos' => $reconocimientos
        ]);
    }
}
