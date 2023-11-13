<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyecto Crear') }}
        </h2>
    </x-slot>
    
    @include('layouts.navigation') 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div id="mensaje"
                    class="uppercase border border-green-600 rounded-lg
                    bg-green-100 text-green-600 font-bold p-2 my-3 text-center">
                    {{ session('mensaje') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:crear-proyecto />
                    <livewire:mostrar-proyecto />
                </div>
            </div>
        </div>
    </div>

    @push('desaparecer')
        <script>
            setTimeout(() => {
                let mensaje = document.getElementById('mensaje');

                // Agrega una transición de escala y opacidad
                mensaje.style.transition = 'transform 0.5s ease-out, opacity 0.5s ease-out';

                // Escala el mensaje y cambia la opacidad para iniciar la animación
                mensaje.style.transform = 'scale(0.8)';
                mensaje.style.opacity = '0';

                // Después de que termine la animación, oculta el elemento
                setTimeout(() => {
                    mensaje.style.display = 'none';
                }, 500); // Este valor debe coincidir con la duración de la animación (en milisegundos)
            }, 3000);
        </script>
    @endpush

</x-app-layout>
