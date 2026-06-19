@extends('layouts.app')

@section('title', 'Cek Request')

@section('content')

<div class="mb-8 text-center">
    @include('partials.steam')
    <h1 class="font-display text-3xl text-cream mb-2">Cek Request Kamu</h1>
    <p class="text-cream/60 text-sm">Masukkan kode antrian yang kamu dapat setelah submit lagu</p>
</div>

@if (session('success'))
    <div class="bg-sage/20 border border-sage text-cream px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-brick/20 border border-brick text-cream px-4 py-3 rounded-lg mb-6 text-sm">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('my-request.lookup') }}" method="POST" class="flex gap-2 mb-8">
    @csrf
    <input type="text" name="queue_code" placeholder="HS-XXXXXX" required
        class="flex-1 bg-[#1F130D] border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 font-mono focus:outline-none focus:border-caramel uppercase">
    <button type="submit"
        class="bg-caramel text-espresso font-sans font-semibold px-5 rounded-lg hover:bg-caramel/90 transition">
        Cari
    </button>
</form>

@isset($songRequest)
    <div class="bg-[#1F130D] border border-dashed border-caramel/30 rounded-xl p-6">

        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="font-display text-cream text-xl">{{ $songRequest->song_title }}</p>
                <p class="text-cream/60 text-sm">{{ $songRequest->artist_name }}</p>
            </div>
            <span class="font-mono text-xs text-cream/50 bg-espresso px-2 py-1 rounded">
                {{ $songRequest->queue_code }}
            </span>
        </div>

        <div class="text-sm text-cream/50 space-y-1 mb-5">
            <p>Dari: {{ $songRequest->requester_name }}</p>
            <p>Mood: {{ ucfirst(str_replace('_', ' ', $songRequest->mood)) }}</p>
            <p>
                Status:
                @if ($songRequest->status === 'queued')
                    <span class="text-sage">Menunggu Antrian</span>
                @elseif ($songRequest->status === 'playing')
                    <span class="text-brick">Sedang Diputar</span>
                @elseif ($songRequest->status === 'played')
                    <span class="text-cream/40">Sudah Diputar</span>
                @else
                    <span class="text-cream/40">Dibatalkan</span>
                @endif
            </p>
        </div>

        @if (in_array($songRequest->status, ['queued', 'cancelled']))
            <form action="{{ route('my-request.delete', $songRequest->queue_code) }}" method="POST"
                onsubmit="return confirm('Hapus request ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full border border-brick text-brick font-sans py-2 rounded-lg hover:bg-brick/10 transition">
                    Hapus Request
                </button>
            </form>
        @else
            <p class="text-cream/40 text-xs text-center">Request yang sudah diputar tidak dapat dihapus.</p>
        @endif

    </div>
@endisset

@endsection