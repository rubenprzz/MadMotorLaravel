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

    <style>
        .my-hover-class:hover {
            color: black !important;
        }
    </style>

@endsection
