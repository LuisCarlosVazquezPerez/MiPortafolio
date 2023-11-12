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

    public function eliminarReconocimiento(Reconocimiento $reconocimiento){
        if( $reconocimiento->Pdf ) {
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

        $reconocimientos = Reconocimiento::where('Tecnologias', 'like', '%' . $this->buscar . '%')
        ->orWhere('Empresa', 'like', '%' . $this->buscar . '%')
        ->orderBy('Empresa', $this->ordenar)
        ->get();

        // $reconocimientos = Reconocimiento::all();

        return view('livewire.mostrar-reconocimientos',[
            'reconocimientos' => $reconocimientos
        ]);
    }
}
