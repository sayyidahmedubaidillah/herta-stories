@extends('layouts.app')

@section('title', 'Antrian Lagu')

@section('content')

<div class="mb-8 text-center">
    @include('partials.steam')
    <h1 class="font-display text-3xl text-cream mb-2">Antrian Lagu</h1>
    <p class="text-cream/60 text-sm">
        <a href="{{ route('display') }}" class="text-caramel hover:underline">🎵 Lihat Now Playing</a>
    </p>
</div>



@if ($queue->isEmpty())
    <div class="bg-[#1F130D] border border-caramel/20 rounded-xl p-8 text-center">
        <p class="text-cream/50">Belum ada antrian saat ini.</p>
    </div>
@else
    <div class="space-y-3">
        @foreach ($queue as $index => $item)
            <div class="bg-[#1F130D] border border-dashed border-caramel/30 rounded-lg p-4 flex items-center gap-4">
                <div class="font-mono text-caramel text-lg font-semibold w-8 text-center">
                    {{ $index + 1 }}
                </div>
                <div class="flex-1">
                    <p class="font-display text-cream text-lg">{{ $item->song_title }}</p>
                    <p class="text-cream/60 text-sm">{{ $item->artist_name }}</p>
                    <p class="text-cream/40 text-xs mt-1">Dari: {{ $item->requester_name }} · {{ ucfirst(str_replace('_', ' ', $item->mood)) }}</p>
                </div>
                <div class="font-mono text-xs text-cream/50 bg-espresso px-2 py-1 rounded">
                    {{ $item->queue_code }}
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection