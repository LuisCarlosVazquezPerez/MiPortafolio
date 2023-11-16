<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Livewire\Component;

class BuscarReconocimiento extends Component
{
    public $buscar = '';
    public $ordenar = 'asc';
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
        $this->ordenar = ($this->ordenar == 'asc') ? 'desc' : 'asc';
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

        $reconocimientos = $query->orderBy('Empresa', $this->ordenar)->get();


        return view('livewire.buscar-reconocimiento',[
            'reconocimientos' => $reconocimientos
        ]);
    }
}
