<div>

    {{-- ! BUSCADOR --}}
    <div>

        <div class='block lg:flex gap-8 mt-9 items-center lg:justify-center'> {{-- PADRE --}}

            <div
                class="relative flex items-center w-5/6 mx-auto lg:mx-0 lg:w-1/5 h-12 rounded-lg bg-white overflow-hidden">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input wire:model.live='buscar' class="peer w-full outline-none text-sm text-gray-700 pr-2"
                    type="search" id="search" placeholder="Buscar tecnologías..." />
            </div>


            <button wire:click="Ordenar">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="hidden lg:flex icon icon-tabler icon-tabler-sort-ascending-letters text-gray-400 hover:text-indigo-900 cursor-pointer"
                    width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                    <path d="M19 21h-4l4 -7h-4" />
                    <path d="M4 15l3 3l3 -3" />
                    <path d="M7 6v12" />
                </svg>
            </button>

            <select wire:model.live="tecnologiaSeleccionada"
                class="hidden lg:flex text-gray-400 lg:w-1/5 h-12  py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                <option value="" selected>Seleccionar</option>
                @foreach ($tecnologiasDisponibles as $tecnologia)
                    <option class="text-black" value="{{ $tecnologia }}">{{ $tecnologia }}</option>
                @endforeach
            </select>

        </div>

    </div>



    <div class="md:grid md:grid-cols-2 lg:grid-cols-3 w-11/12 mx-auto justify-center gap-4 mt-5">

        {{-- * INICIA LA CARD --}}
        @foreach ($proyectos as $proyecto)
            <div class="flex rounded-lg bg-white md:max-w-xl flex-col md:flex-row som lg:mt-0 mt-3">

                {{-- BACKGROUND IMAGE --}}
                <div class="rounded-lg md:rounded-r-full h-[250px] md:w-2/5 md:h-auto flex-shrink-0 bg-cover bg-center relative"
                    style="background-image: url('{{ asset('storage/proyectos/' . $proyecto->Imagen) }}');">

                    {{-- ICONO --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="#">
                            <svg class="opacity-70 hover:scale-125 transition ease rounded-full p-1 bg-white hover:opacity-100"
                                xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col  p-6 relative">
                    <div class="flex items-center justify-center gap-2">
                        <p class="text-xl font-medium text-neutral-800 text-center">
                            {{ $proyecto->Nombre }}
                        </p>
                    </div>
                    <p class="flex-grow mb-2  text-neutral-600 text-center">
                        {{ $proyecto->Descripcion }}
                    </p>


                    <div class="text-center">
                        @foreach (explode(', ', $proyecto->Tecnologias) as $tecnologia)
                            @if ($tecnologia == 'CSS' || $tecnologia == 'MySQL')
                                <span
                                    class="bg-blue-500 text-blue-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'Vue')
                                <span
                                    class="bg-green-500 text-green-100 text-xs font-bold  px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'JavaScript')
                                <span
                                    class="bg-yellow-500 text-yellow-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'HTML')
                                <span
                                    class="bg-orange-500 text-orange-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'PHP' || $tecnologia == 'Bootstrap')
                                <span
                                    class="bg-indigo-500 text-indigo-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif (
                                $tecnologia == 'Angular' ||
                                    $tecnologia == 'Git' ||
                                    $tecnologia == 'Sass' ||
                                    $tecnologia == 'Laravel' ||
                                    $tecnologia == 'Java')
                                <span
                                    class="bg-red-500 text-red-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'React' || $tecnologia == 'TypeScript')
                                <span
                                    class="bg-sky-500 text-sky-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'Livewire')
                                <span
                                    class="bg-pink-500 text-pink-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'Tailwind')
                                <span
                                    class="bg-cyan-500 text-cyan-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @elseif ($tecnologia == 'GitHub')
                                <span
                                    class="bg-gray-500 text-gray-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @else
                                <span
                                    class="bg-emerald-500 text-emerald-100 text-xs font-bold px-2.5 py-0.5 rounded-full drop-shadow-lg">{{ $tecnologia }}</span>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-3 flex justify-end">
                        <a target="_blank" href="{{ $proyecto->Anclas }}"
                            class="relative w-full inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-blue-700 transition duration-300 ease-out border-2 border-blue-600 rounded-full shadow-md group">
                            <span
                                class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-blue-600 group-hover:translate-x-0 ease">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span
                                class="absolute flex items-center justify-center w-full h-full text-blue-500 transition-all duration-300 transform group-hover:translate-x-full ease">Ver</span>
                            <span class="relative invisible">Button Text</span>
                        </a>
                    </div>
                </div>
            </div>
            {{-- * TERMINA LA CARD --}}
        @endforeach
    </div>



</div>


</div>
