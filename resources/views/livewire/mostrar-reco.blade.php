<div>
    {{-- !BUSQUEDA --}}
    <div>
        <div class='block lg:flex gap-8 mt-9 items-center lg:justify-center'> {{-- PADRE --}}

            <div
                class="relative flex items-center w-5/6 mx-auto lg:mx-0 lg:w-1/5 h-12 rounded-lg bg-gray-100 overflow-hidden">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input wire:model.live='buscar' class="peer w-full outline-none text-sm bg-gray-100 text-gray-400  pr-2"
                    type="search" id="search" placeholder="Buscar tecnologías..." />
            </div>


            <button wire:click="Ordenar">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="hidden lg:flex icon icon-tabler icon-tabler-sort-ascending-letters text-gray-400 hover:text-indigo-900 cursor-pointer"
                    width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                    <path d="M19 16v6" />
                    <path d="M22 19l-3 3l-3 -3" />
                    <path d="M16 3v4" />
                    <path d="M8 3v4" />
                    <path d="M4 11h16" />
                </svg>
            </button>

            <select wire:model.live="tecnologiaSeleccionada"
                class="hidden lg:flex bg-gray-100 text-gray-400 lg:w-1/5 h-12  py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                <option value="" selected>Seleccionar</option>
                @foreach ($tecnologiasDisponibles as $tecnologia)
                    <option class="text-black bg-white" value="{{ $tecnologia }}">{{ $tecnologia }}</option>
                @endforeach
            </select>

        </div>
    </div>

    {{-- ! MOSTRAR TODOS LOS RECO --}}

    @foreach ($reconocimientos as $reconocimiento)
        <div
            class="block w-10/12 md:w-4/5 mx-auto mt-3 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
            <h5 class="border-b-2 border-neutral-100 px-6 py-3 text-xl font-bold leading-tight text-blue-800">
                {{ $reconocimiento->Empresa }}
            </h5>
            <div class="p-6 pt-3">

                <div class="lg:flex lg:justify-between block ">
                    <div>
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                            {{ $reconocimiento->Titulo }}
                        </h5>
                        @foreach (explode(', ', $reconocimiento->Tecnologias) as $tecnologia)
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

                    <div class="mt-4 lg:mt-0">
                        <a target="_blank" href="{{ asset('storage/reconocimientos/' . $reconocimiento->Pdf) }}"
                            class="relative w-full inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-700 transition duration-300 ease-out border-2 border-indigo-600 rounded-full shadow-md group">
                            <span
                                class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-indigo-600 group-hover:translate-x-0 ease">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span
                                class="absolute flex items-center justify-center w-full h-full text-indigo-500 transition-all duration-300 transform group-hover:translate-x-full ease">Ver</span>
                            <span class="relative invisible">Button Text</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
