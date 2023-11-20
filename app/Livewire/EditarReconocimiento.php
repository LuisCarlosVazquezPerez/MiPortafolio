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
    public $Fecha;
    public $Empresa;
    public $Tecnologias;
    public $Pdf;
    public $Pdf_Nuevo;

    use WithFileUploads;

    protected $rules = [
        'Titulo' => 'required|string',
        'Fecha' => 'required',
        'Empresa' => 'required|string',
        'Tecnologias' => 'regex:/^(?!.*\b(\w+)\b.*\b\1\b)(?:\b[A-Za-z]+(?:, [A-Za-z]+)*\b)+$/',
        'Pdf_Nuevo' => 'nullable'
    ];

    protected $messages = [
        'Titulo.required' => 'El campo Título es obligatorio.',
        'Fecha.required' => 'El campo Fecha es obligatorio.',
        'Titulo.string' => 'El campo Título debe ser una cadena de caracteres.',
        'Empresa.required' => 'El campo Empresa es obligatorio.',
        'Empresa.string' => 'El campo Empresa debe ser una cadena de caracteres.',
        'Tecnologias.regex' => 'El formato de Tecnologias es incorrecto. Debe ser una lista separada por comas (",") y cada palabra debe comenzar con una letra mayúscula seguida de letras minúsculas y separadas por un espacio (por ejemplo, "React, Vue").',
        'Pdf_Nuevo.nullable' => 'El campo PDF Nuevo es obligatorio si se adjunta un archivo.'
    ];
    


    public function mount(Reconocimiento $reconocimientos)
    {
        $this->reconocimiento_id = $reconocimientos->id;
        $this->Titulo = $reconocimientos->Titulo;
        $this->Fecha = $reconocimientos->Fecha;
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
        $reconocimientos->Fecha = $datos['Fecha'];
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
