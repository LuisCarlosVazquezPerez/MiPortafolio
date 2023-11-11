<div class="overflow-hidden shadow-sm sm:rounded-lg mt-4">

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Nombre</th>
                    <th scope="col" class="px-6 py-4">Tecnologias</th>
                    <th scope="col" class="px-6 py-4">Imagenes</th>
                    <th scope="col" class="px-6 py-4">Editar</th>
                    <th scope="col" class="px-6 py-4">Eliminar</th>
                  </tr>
                </thead>
                @foreach ($proyectos as $proyecto)
                <tbody>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4">{{$proyecto->Nombre}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$proyecto->Tecnologias}}</td>
                    <td class="whitespace-nowrap px-6 py-4"><img class="w-6" src="{{asset('storage/proyectos/'.$proyecto->Imagen)}}" alt="{{$proyecto->Nombre}}"> </td>
                   <td> <a href="{{route('proyectos.edit', $proyecto->id)}}"
                    class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-orange-600 hover:bg-orange-700 active:bg-orange-600">Editar</a></td>
                    <td><button type="button" wire:click="$dispatch('mostrarAlerta',{{$proyecto->id}})"
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
            @this.on('mostrarAlerta', (proyectoId) => {
                Swal.fire({
                    title: '¿Eliminar Proyecto?',
                    text: "Un proyecto eliminado no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarProyecto',proyectoId);
                        Swal.fire(
                            'Se eliminó el proyecto',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
</script>

@endpush