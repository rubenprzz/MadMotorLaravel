@extends('main')
@section('content')
    <section class="landing-section bg-black h-screen w-screen text-center overflow-hidden relative">
        <div class="z-30 relative h-full flex flex-col">
            <header class="">
                <h2 class="text-white pt-40 text-[59px] font-bold font-mono">MADMOTOR</h2>
                <p class=" text-white text-sm">TU CONCESIONARIO DE CONFIANZA

                </p>
            </header>
            <footer class="flex flex-col flex-grow justify-end w-1/4 mx-auto pb-20">
                <a class="border-3 border-white bg-white/5 backdrop-blur-sm text-sm rounded font-medium text-white px-12 py-2 inline-block hover:bg-white hover:text-black transition-colors my-hover-class"
                   href="#">Descubre nuestros productos</a>
            </footer>
        </div>
        <video class="absolute top-0 bottom-0 h-full w-full z-10 object-center object-cover" autoplay muted loop
               src="{{asset('images/video2.webm')}}"></video>

    </section>
    <section class="bg-gray-900 text-center overflow-hidden relative">
        @if(count($vehiculos)>0)
            <div class="flex flex-wrap justify-center">
                @foreach($vehiculos as $vehiculo)
                    <div class="row flex overflow-x-auto">
                        <div
                            class="m-4 text-gray-700 bg-black shadow-md bg-clip-border rounded-xl ring-2 ring-red-500 ring-opacity-20 max-w-sm">
                            <div
                                class="relative mx-4 mt-4 overflow-hidden  bg-white bg-clip-border rounded-xl h-96">
                                <img
                                    src="{{$vehiculo->imagen}}"
                                    alt="card-image" class="object-cover w-full h-full"/>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-200">
                                        {{$vehiculo->marca}}
                                    </p>
                                    <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{number_format($vehiculo->precio, 0,0 )}}€
                                    </p>
                                </div>
                                <div class="flex items-center justify-between mb-2">
                                    <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$vehiculo->year}}
                                    </p>
                                    <p class="block font-sans text-white antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$vehiculo->km}} km
                                    </p>
                                </div>
                            </div>
                            <div class="relative inline-flex  group pb-2">
                                <a href="#"
                                   class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                                    <span
                                        class="w-48 h-48 rounded rotate-[-40deg] bg-gray-900 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                                    <span
                                        class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Añadir al carrito</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="flex flex-row justify-center">
            <div class="flex flex-row justify-center">
                <a href="{{route('vehiculos.index')}}"
                   class="border-3 border-white bg-white/5 backdrop-blur-sm text-sm rounded font-medium text-white px-12 py-2 inline-block hover:bg-white hover:text-black transition-colors my-hover-class">
                    Ver todos los vehículos
                </a>
            </div>
        </div>
        <div>
            @if(count($piezas)>0)
                @foreach($piezas as $pieza)
                    <div class="row flex overflow-x-auto">
                        <div
                            class="m-4 text-gray-700 bg-black shadow-md bg-clip-border rounded-xl ring-2 ring-red-500 ring-opacity-20 max-w-sm">
                            <div
                                class="relative mx-4 mt-4 overflow-hidden  bg-white bg-clip-border rounded-xl h-96">
                                <img
                                    src="{{$pieza->imagen}}"
                                    alt="card-image" class="object-cover w-full h-full"/>
                            </div>
                            <div class="p-6">
                                <div class="flex items center justify-between mb-2">
                                    <p class="block font sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-200">
                                        {{$pieza->nombre}}
                                    </p>
                                    <p class="block font sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{number_format($pieza->precio, 0,0 )}}€
                                    </p>
                                </div>
                                <div class="flex items center justify-between mb-2">
                                    <p class="block font sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$pieza->marca}}
                                    </p>
                                    <p class="block font sans text-white antialiased font-medium leading-relaxed text-blue-gray-900">
                                        {{$pieza->modelo}}
                                    </p>
                                </div>
                            </div>
                            <div class="relative inline-flex  group pb-2">
                                <a href="#"
                                   class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                                    <span
                                        class="w-48 h-48 rounded rotate-[-40deg] bg-gray-900 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                                    <span
                                        class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Añadir al carrito</span>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif
        </div>


    </section>


    <style>
        .my-hover-class:hover {
            color: black !important;
        }
    </style>

@endsection
