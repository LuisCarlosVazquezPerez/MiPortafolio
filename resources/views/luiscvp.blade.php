<x-app-layout>
    @include('layouts.navegacion')
    <h1 class="bg-red-200">Hola</h1>


    <a href="{{route('proyectos.index')}}">Proyectos</a>
    <a href="{{route('reconocimientos.index')}}">Reco</a>

</x-app-layout>
