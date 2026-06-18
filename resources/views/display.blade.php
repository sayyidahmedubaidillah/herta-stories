@extends('layouts.app')

@section('title', 'Now Playing')

@section('content')

<div class="mb-8 text-center">
    <p class="text-cream/60 text-sm">
        <div class="mb-8 text-center">
    @include('partials.steam')
    <p class="text-cream/60 text-sm">
        <a href="{{ route('queue') }}" class="text-caramel hover:underline">📋 Lihat Antrian</a>
    </p>
</div>
      

@if ($nowPlaying)
    <div class="bg-brick/10 border-2 border-brick rounded-xl p-8 text-center mb-10">
        <p class="font-mono text-brick text-xs tracking-widest mb-3">SEDANG DIPUTAR</p>
        <h2 class="font-display text-3xl text-cream mb-2">{{ $nowPlaying->song_title }}</h2>
        <p class="text-cream/70 mb-4">{{ $nowPlaying->artist_name }}</p>

        <div class="flex justify-center gap-4 text-xs text-cream/50 mb-4">
            <span>Dari: {{ $nowPlaying->requester_name }}</span>
            <span>·</span>
            <span>{{ ucfirst(str_replace('_', ' ', $nowPlaying->mood)) }}</span>
        </div>

        @if ($nowPlaying->message)
            <p class="font-display italic text-cream/80 text-lg">"{{ $nowPlaying->message }}"</p>
        @endif

        <p class="font-mono text-xs text-cream/40 mt-4">{{ $nowPlaying->queue_code }}</p>
    </div>
@else
    <div class="bg-[#1F130D] border border-caramel/20 rounded-xl p-8 text-center mb-10">
        <p class="text-cream/50">Belum ada lagu yang sedang diputar.</p>
    </div>
@endif

<h3 class="font-display text-xl text-cream mb-4 text-center">Up Next</h3>

@if ($upNext->isEmpty())
    <p class="text-cream/40 text-sm text-center">Tidak ada antrian berikutnya.</p>
@else
    <div class="space-y-2">
        @foreach ($upNext as $item)
            <div class="bg-[#1F130D] border border-dashed border-caramel/20 rounded-lg px-4 py-3 flex items-center justify-between">
                <div>
                    <span class="text-cream">{{ $item->song_title }}</span>
                    <span class="text-cream/40 text-sm"> — {{ $item->artist_name }}</span>
                </div>
                <span class="font-mono text-xs text-cream/30">{{ $item->queue_code }}</span>
            </div>
        @endforeach
    </div>
@endif

@endsection