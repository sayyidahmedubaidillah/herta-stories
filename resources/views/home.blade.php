@extends('layouts.app')

@section('title', 'Herta Stories')

@section('content')

<div class="flex flex-col items-center justify-center text-center py-12">

    @include('partials.steam')

    <h1 class="font-display text-4xl text-cream mb-3">Herta Stories</h1>
    <p class="text-cream/60 text-sm max-w-sm mb-10">
        Setiap lagu punya cerita. Titipkan lagumu, kami putarkan sambil kamu menikmati secangkir kopi.
    </p>


@include('partials.icon-strip')

<div class="flex flex-col sm:flex-row gap-3 w-full max-w-xs">
    <div class="flex flex-col sm:flex-row gap-3 w-full max-w-xs">
        <a href="{{ route('request.create') }}"
            class="flex-1 bg-caramel text-espresso font-sans font-semibold py-3 rounded-lg hover:bg-caramel/90 transition text-center">
            Request Lagu
        </a>
        <a href="{{ route('queue') }}"
            class="flex-1 border border-caramel/40 text-cream font-sans py-3 rounded-lg hover:border-caramel transition text-center">
            Lihat Antrian
        </a>
    </div>

</div>

@endsection