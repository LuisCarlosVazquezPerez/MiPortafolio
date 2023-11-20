<div>

    <div class='block lg:flex gap-8 mt-9 items-center lg:justify-center'> {{-- PADRE --}}

        <div class="relative flex items-center w-5/6 mx-auto lg:mx-0 lg:w-1/5 h-12 rounded-lg overflow-hidden">
            <div class="grid place-items-center h-full w-12 text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input wire:model.live='buscar' class="peer w-full outline-none text-sm text-gray-700 pr-2" type="search"
                id="search" placeholder="Buscar tecnologías..." />
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

        <select
        wire:model.live="tecnologiaSeleccionada"
            class="hidden lg:flex text-gray-400 lg:w-1/5 h-12  py-3 px-4 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            <option selected>Seleccionar</option>
            <option class="text-black">1</option>
            <option class="text-black">2</option>
            <option class="text-black">3</option>
        </select>

    </div>

</div>
