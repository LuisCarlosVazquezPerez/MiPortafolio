<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarReconocimientos extends Component
{

    protected $listeners = ['eliminarReconocimiento'];

    public function eliminarReconocimiento(Reconocimiento $reconocimiento){
        if( $reconocimiento->Pdf ) {
            Storage::delete('public/reconocimientos/' . $reconocimiento->Pdf);            
        } 

        $reconocimiento->delete();
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        $reconocimientos = Reconocimiento::all();
        return view('livewire.mostrar-reconocimientos',[
            'reconocimientos' => $reconocimientos
        ]);
    }
}
