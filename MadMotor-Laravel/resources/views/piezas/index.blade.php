@extends('main')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


    <title>Tailwind CSS CDN</title>
</head>
<body>

@foreach($piezas as $pieza)
<div class="p-10 grid  grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

    <div class="rounded overflow-hidden shadow-lg">
        <img class="w-1/4" src="{{$pieza->imagen}}" alt="Mountain">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$pieza->nombre}}</div>
            <p class="text-gray-700 text-base">
                {{$pieza->descripcion}}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <a href="{{route('carrito.index')}}"><span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Añadir al carrito</span></a>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div>
    </div>

</div>
@endforeach

</body>
@endsection
