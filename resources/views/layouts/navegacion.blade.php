<!-- Main navigation container -->
<nav class="relative flex w-full flex-nowrap items-center justify-between bg-white py-2 lg:flex-wrap lg:justify-start lg:py-4"
    data-te-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between lg:w-3/4 lg:mx-auto px-3">
        <div class="ml-2">
            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-brand-github-filled text-blue-800 hover:text-blue-900 hover:scale-110 transition ease-in-out"
                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c9de00" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M5.315 2.1c.791 -.113 1.9 .145 3.333 .966l.272 .161l.16 .1l.397 -.083a13.3 13.3 0 0 1 4.59 -.08l.456 .08l.396 .083l.161 -.1c1.385 -.84 2.487 -1.17 3.322 -1.148l.164 .008l.147 .017l.076 .014l.05 .011l.144 .047a1 1 0 0 1 .53 .514a5.2 5.2 0 0 1 .397 2.91l-.047 .267l-.046 .196l.123 .163c.574 .795 .93 1.728 1.03 2.707l.023 .295l.007 .272c0 3.855 -1.659 5.883 -4.644 6.68l-.245 .061l-.132 .029l.014 .161l.008 .157l.004 .365l-.002 .213l-.003 3.834a1 1 0 0 1 -.883 .993l-.117 .007h-6a1 1 0 0 1 -.993 -.883l-.007 -.117v-.734c-1.818 .26 -3.03 -.424 -4.11 -1.878l-.535 -.766c-.28 -.396 -.455 -.579 -.589 -.644l-.048 -.019a1 1 0 0 1 .564 -1.918c.642 .188 1.074 .568 1.57 1.239l.538 .769c.76 1.079 1.36 1.459 2.609 1.191l.001 -.678l-.018 -.168a5.03 5.03 0 0 1 -.021 -.824l.017 -.185l.019 -.12l-.108 -.024c-2.976 -.71 -4.703 -2.573 -4.875 -6.139l-.01 -.31l-.004 -.292a5.6 5.6 0 0 1 .908 -3.051l.152 -.222l.122 -.163l-.045 -.196a5.2 5.2 0 0 1 .145 -2.642l.1 -.282l.106 -.253a1 1 0 0 1 .529 -.514l.144 -.047l.154 -.03z"
                        stroke-width="0" fill="currentColor" />
                </svg>
            </a>
        </div>
        <!-- Hamburger button for mobile view -->
        <button
            class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0  lg:hidden"
            type="button" data-te-collapse-init data-te-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Collapsible navbar container -->
        <div class="!visible mt-7 hidden basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
            id="navbarSupportedContent2" data-te-collapse-item>
            <!-- Left links -->
            <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row lg:gap-6" data-te-navbar-nav-ref>

                <!-- Features link -->
                <li class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1">
    
                    @php
                        $isActive = request()->routeIs('luiscvp');
                    @endphp

                    <a class="p-0 underline-animation lg:px-2 hover:text-blue-800  {{ $isActive ? 'active texto' : '' }}"
                        href="{{ route('luiscvp') }}" data-te-nav-link-ref>Inicio</a>

                </li>

                <li class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                  @php
                  $isActive = request()->routeIs('acerca.index');
              @endphp

              <a class="p-0 underline-animation lg:px-2 hover:text-blue-800   {{ $isActive ? 'active texto' : '' }}"
                  href="{{ route('acerca.index') }}" data-te-nav-link-ref>Acerca de mi</a>
                </li>

                <!-- Pricing link -->
                <li class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                
                  @php
                  $isActive = request()->routeIs('proyectos.index');
              @endphp

              <a class="p-0 underline-animation lg:px-2 hover:text-blue-800  {{ $isActive ? 'active texto' : '' }}"
                  href="{{ route('proyectos.index') }}" data-te-nav-link-ref>Portafolio</a>

                </li>

                <li class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                  @php
                  $isActive = request()->routeIs('reconocimientos.index');
              @endphp

              <a class="p-0 underline-animation lg:px-2 hover:text-blue-800  {{ $isActive ? 'active texto' : '' }}"
                  href="{{ route('reconocimientos.index') }}" data-te-nav-link-ref>Reconocimientos</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
