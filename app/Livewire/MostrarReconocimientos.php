<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarReconocimientos extends Component
{

    protected $listeners = ['eliminarReconocimiento'];

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


    public function eliminarReconocimiento(Reconocimiento $reconocimiento)
    {
        if ($reconocimiento->Pdf) {
            Storage::delete('public/reconocimientos/' . $reconocimiento->Pdf);
        }

        $reconocimiento->delete();
        return redirect(request()->header('Referer'));
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

        return view('livewire.mostrar-reconocimientos', [
            'reconocimientos' => $reconocimientos
        ]);
    }
}
