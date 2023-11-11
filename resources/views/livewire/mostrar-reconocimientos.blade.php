<div class="overflow-hidden shadow-sm sm:rounded-lg mt-4">

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Titulo</th>
                    <th scope="col" class="px-6 py-4">Empresa</th>
                    <th scope="col" class="px-6 py-4">Tecnologia</th>
                    <th scope="col" class="px-6 py-4">PDF</th>
                    <th scope="col" class="px-6 py-4">Editar</th>
                    <th scope="col" class="px-6 py-4">Eliminar</th>
                  </tr>
                </thead>
                @foreach ($reconocimientos as $reconocimiento)
                <tbody>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4">{{$reconocimiento->Titulo}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$reconocimiento->Empresa}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$reconocimiento->Tecnologias}}</td>
                    <td class="whitespace-nowrap px-6 py-4"><a target="_blank" href="{{asset('storage/reconocimientos/'.$reconocimiento->Pdf)}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf w-10 hover:text-cyan-400" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                        <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                        <path d="M17 18h2" />
                        <path d="M20 15h-3v6" />
                        <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                      </svg></a></td>
                   <td> <a href="#"
                    class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-orange-600 hover:bg-orange-700 active:bg-orange-600">Editar</a></td>
                    <td><button type="button" wire:click="$dispatch('mostrarAlerta',{{$reconocimiento->id}})"
                        class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-red-600 hover:bg-red-700 active:bg-red-600">Eliminar</button></td>
                </tr>
                </tbody>
                @endforeach
              </table>
              

            </div>
          </div>
        </div>
      </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
      document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (reconocimientoId) => {
                Swal.fire({
                    title: '¿Eliminar Reconocimiento?',
                    text: "Un Reconocimiento eliminado no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarReconocimiento',reconocimientoId);
                        Swal.fire(
                            'Se eliminó el reconocimiento',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
</script>

@endpush