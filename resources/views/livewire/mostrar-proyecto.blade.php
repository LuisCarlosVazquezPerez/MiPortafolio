<div class="overflow-hidden shadow-sm sm:rounded-lg mt-4">



    <div class="mb-3 w-1/3">
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
            <input wire:model.live='buscar' type="search"
                class="relative m-0 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                placeholder="Ej. React, Laravel" aria-label="Search" aria-describedby="button-addon2" />

            <!--Search icon-->
            <span
                class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
                id="basic-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <button wire:click="Ordenar">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort w-7 hover:text-green-600" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M3 9l4 -4l4 4m-4 -4v14" />
                  <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                </svg>
              </button>
        </div>
    </div>

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
                                <tr wire:key="{{ $proyecto->id }} class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $proyecto->Nombre }}</td>
                                    <td>
                                        @foreach (explode(', ', $proyecto->Tecnologias) as $Pro)
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-blue-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-cyan-700">{{ $Pro }}</span>
                                        @endforeach
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"><img class="w-6"
                                            src="{{ asset('storage/proyectos/' . $proyecto->Imagen) }}"
                                            alt="{{ $proyecto->Nombre }}"> </td>
                                    <td> <a href="{{ route('proyectos.edit', $proyecto->id) }}"
                                            class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-orange-600 hover:bg-orange-700 active:bg-orange-600">Editar</a>
                                    </td>
                                    <td><button type="button"
                                            wire:click="$dispatch('mostrarAlerta',{{ $proyecto->id }})"
                                            class="px-6 py-2.5 rounded-full text-white text-sm tracking-wider font-semibold border-none outline-none bg-red-600 hover:bg-red-700 active:bg-red-600">Eliminar</button>
                                    </td>
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
                        @this.call('eliminarProyecto', proyectoId);
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
