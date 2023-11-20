<div>

    <form wire:submit.prevent='actualizarReconocimiento'>
        <button
            class="w-full mb-6 justify-center mt-6 relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-green-600 border-2 border-green-600 rounded-full hover:text-white group hover:bg-gray-50">
            <span
                class="absolute left-0 block w-full h-0 transition-all bg-green-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
            <span
                class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </span>
            <span class="relative">Actualizar Reconocimiento</span>
        </button>


        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="text" wire:model="Titulo"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput1" />

            <label for="exampleFormControlInput1"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0]
               truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 
               ease-out @if ($Titulo) transform translate-y-[-0.9rem] scale-[0.8] text-primary @endif
               peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none
               ">
                Titulo
            </label>

            @error('Titulo')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="text" wire:model="Empresa"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput2" />
            <label for="exampleFormControlInput2"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 
             ease-out @if ($Empresa) transform translate-y-[-0.9rem] scale-[0.8] text-primary @endif
             peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none
             ">
                Empresa
            </label>
            @error('Empresa')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>
        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="date" wire:model="Fecha"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput2" />
            <label for="exampleFormControlInput2"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 
             ease-out @if ($Fecha) transform translate-y-[-0.9rem] scale-[0.8] text-primary @endif
             peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none
             ">
                Fecha
            </label>
            @error('Fecha')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>


        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="text" wire:model="Tecnologias"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput3" />
            <label for="exampleFormControlInput3"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 
             ease-out  @if ($Tecnologias) transform translate-y-[-0.9rem] scale-[0.8] text-primary @endif 
             peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none
             ">
                Tecnologias
            </label>
            @error('Tecnologias')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>


        <div class="mb-3">
            <input type="file" wire:model='Pdf_Nuevo' accept=".pdf"
                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                id="formFile" />

            <div class="mt-3">
                @error('Pdf_Nuevo')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror
            </div>
        </div>
    </form>
</div>
