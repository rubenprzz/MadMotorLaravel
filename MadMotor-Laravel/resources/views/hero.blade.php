@extends('main')
@section('content')
    <div class="position-relative w-100 d-flex flex-column justify-content-center align-items-center text-white">


        <video
            slot="background"
            class="object-center object-cover h-full w-full"
            autoplay
            muted
            loop
            src="{{asset('images/intro.webm')}}"></video>
    </div>

@endsection
