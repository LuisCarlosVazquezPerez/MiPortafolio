<x-app-layout>
    @include('layouts.navegacion')

    <div class="flex flex-col-reverse md:grid md:grid-cols-2 w-11/12 mx-auto">
        <div class="flex justify-center items-center">
            <x-mi-nombre />
        </div>

        <div>
            <x-mi-foto />
        </div>
      </div>
      
      <div class="mt-10">
        <x-skills />
      </div>

      <x-about-me-layout class="mt-10" :edad="$edad" />
      <x-backfront />
      
      <x-proyectos-layout class="mt-10" />


      
      


</x-app-layout>
