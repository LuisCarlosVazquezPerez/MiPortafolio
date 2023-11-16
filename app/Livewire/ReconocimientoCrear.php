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
        'Tecnologias' => 'regex:/^(?!.*\b(\w+)\b.*\b\1\b)(?:\b[A-Za-z]+(?:, [A-Za-z]+)*\b)+$/',
        'Pdf' => 'required',
    ];

    protected $messages = [
        'Titulo.required' => 'El campo Título es obligatorio.',
        'Titulo.string' => 'El campo Título debe ser una cadena de caracteres.',
        'Empresa.required' => 'El campo Empresa es obligatorio.',
        'Empresa.string' => 'El campo Empresa debe ser una cadena de caracteres.',
        'Tecnologias.regex' => 'El formato de Tecnologias es incorrecto. Debe ser una lista separada por comas (",") y cada palabra debe comenzar con una letra mayúscula seguida de letras minúsculas y separadas por un espacio (por ejemplo, "React, Vue").',
        'Pdf.required' => 'El campo PDF es obligatorio.'
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
