<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReconocimientoCrear extends Component
{

    public $Titulo;
    public $Empresa;
    public $Tecnologias;
    public $Pdf;

    use WithFileUploads;


    protected $rules = [
        'Titulo' => 'required|string',
        'Empresa' => 'required|string',
        'Tecnologias' => 'required|string',
        'Pdf' => 'required',
    ];

    public function crearReconocimientos()
    {
        $datos = $this->validate();

      //ALMACENAR PDF
        $PDF = $this->Pdf->store('public/reconocimientos');
        $datos['Pdf'] = str_replace('public/reconocimientos/', '', $PDF);

        Reconocimiento::create([
            'Titulo' => $datos['Titulo'],
            'Empresa' => $datos['Empresa'],
            'Tecnologias' => $datos['Tecnologias'],
            'Pdf' => $datos['Pdf'],
            'user_id' => auth()->user()->id
        ]);    

            $this->dispatch('creado');   
    }

    public function render()
    {
        return view('livewire.reconocimiento-crear');
    }
}
