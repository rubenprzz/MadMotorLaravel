@extends('main')
@section('content')
    <div class="container mx-auto pt-20 mt-5">
        <div class="flex flex-col justify-center gap-5 bg-white-800">

            @foreach($piezas as $pieza)
                <div
                    class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
                    <div class="w-full md:w-1/3 bg-white grid place-items-center  rounded-md">
                        <img src="{{$pieza->imagen}}" alt="tailwind logo" class="rounded-xl object-cover"/>
                    </div>
                    <div class="w-full md:w-2/3 bg-gray-300 rounded-lg flex flex-col space-y-2 p-3">
                        <div class="flex justify-between item-center">
                            <div class="flex items-center">

                                <p class="text-gray-600 font-bold text-sm ml-1">
                                    4.96
                                    <span class="text-gray-500 font-normal">(76 reviews)</span>
                                </p>
                            </div>

                            <div
                                class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                                MadMotor
                            </div>
                        </div>
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{$pieza->nombre}}</h3>
                        <p class="md:text-lg text-gray-500 text-base">{{$pieza->descripcion}}</p>
                        <p class="text-xl font-black text-gray-800">
                            {{$pieza->precio}}
                            <span class="font-normal text-gray-600 text-base">/pz</span>
                        </p>
                        <p class="text-xl font-black text-gray-800">
                            {{$pieza->cantidad}}
                            <span class="font-normal text-gray-600 text-base">uds</span>
                        </p>
                        <a href="{{route('piezas.show',$pieza->id)}}">
                            <button
                                class="bg-green  hover:bg-blue-500 text-white-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Ver detalles
                            </button>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @
@endsection

