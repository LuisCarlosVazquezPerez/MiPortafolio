<?php

namespace App\Livewire;

use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarReconocimiento extends Component
{

    public $reconocimiento_id;
    public $Titulo;
    public $Empresa;
    public $Tecnologias;
    public $Pdf;
    public $Pdf_Nuevo;

    use WithFileUploads;

    protected $rules = [
        'Titulo' => 'required|string',
        'Empresa' => 'required|string',
        'Tecnologias' => 'required|string',
        'Pdf_Nuevo' => 'nullable'
    ];


    public function mount(Reconocimiento $reconocimientos)
    {
        $this->reconocimiento_id = $reconocimientos->id;
        $this->Titulo = $reconocimientos->Titulo;
        $this->Empresa = $reconocimientos->Empresa;
        $this->Tecnologias = $reconocimientos->Tecnologias;
        $this->Pdf = $reconocimientos->Pdf;
    }

    public function actualizarReconocimiento()
    {
        $datos = $this->validate();

        $eliminarPdf = Reconocimiento::find($this->reconocimiento_id);

        //!SI HAY UNA IMAGEN NUEVA!!
        //* Verifica si se proporcionó un nuevo archivo PDF
        if ($this->Pdf_Nuevo) {
            // *Almacena el nuevo archivo PDF en el directorio 'public/reconocimientos'
            $Pdf = $this->Pdf_Nuevo->store('public/reconocimientos');

            // *Modifica los datos del formulario: reemplaza la ruta del archivo por solo el nombre de archivo
            $datos['Pdf'] = str_replace('public/reconocimientos/', '', $Pdf);

            //* Elimina el archivo PDF anterior asociado con el reconocimiento
            Storage::delete('public/reconocimientos/' . $eliminarPdf->Pdf);
        }

        $reconocimientos = Reconocimiento::find($this->reconocimiento_id);
        $reconocimientos->Titulo = $datos['Titulo'];
        $reconocimientos->Empresa = $datos['Empresa'];
        $reconocimientos->Tecnologias = $datos['Tecnologias'];
        $reconocimientos->Pdf = $datos['Pdf'] ?? $reconocimientos->Pdf;

        $reconocimientos->save();

        return redirect()->route('reconocimientos.create')->with('mensaje', 'Se actualizo correctamente!');
    }


    public function render()
    {
        $reconocimientos = Reconocimiento::all();
        return view('livewire.editar-reconocimiento');
    }
}
