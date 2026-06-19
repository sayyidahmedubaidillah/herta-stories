@extends('layouts.app')

@section('title', 'Request Song')

@section('content')

<div class="mb-8 text-center">
    @include('partials.steam')
    <h1 class="font-display text-3xl text-cream mb-2">Titip Lagu, Titip Cerita</h1>
    <p class="text-cream/60 text-sm">Pilih lagu, tulis pesan, biar kami putarkan untukmu</p>
</div>

@if (session('success'))
    <div class="bg-sage/20 border border-sage rounded-xl p-5 mb-6 text-center">
        <p class="text-cream text-sm mb-3">{{ session('success') }}</p>

        <p class="font-mono text-2xl text-caramel tracking-wider mb-2" id="queueCode">
            {{ session('queue_code') }}
        </p>

        <button
            type="button"
            onclick="copyQueueCode()"
            class="text-xs text-cream/70 border border-caramel/40 rounded-lg px-3 py-1.5 hover:border-caramel transition"
            id="copyBtn"
        >
            📋 Copy Kode
        </button>

        <p class="text-brick text-xs mt-3">
            ⚠️ Simpan kode ini, kamu butuh buat cek/hapus request nanti!
        </p>
    </div>
@endif

@if ($errors->any())
    <div class="bg-brick/20 border border-brick text-cream px-4 py-3 rounded-lg mb-6 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('request.store') }}" method="POST" class="bg-[#1F130D] border border-caramel/20 rounded-xl p-6 space-y-5">
    @csrf

    <div>
        <label class="block text-cream/70 text-sm mb-1">Nama Kamu</label>
        <input type="text" name="requester_name" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel">
    </div>

    <div>
        <label class="block text-cream/70 text-sm mb-1">Judul Lagu</label>
        <input type="text" name="song_title" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel">
    </div>

    <div>
        <label class="block text-cream/70 text-sm mb-1">Penyanyi</label>
        <input type="text" name="artist_name" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel">
    </div>

    <div>
        <label class="block text-cream/70 text-sm mb-1">Mood</label>
        <select name="mood" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream focus:outline-none focus:border-caramel">
            <option value="">Pilih Mood</option>
            <option value="happy">Happy</option>
            <option value="relaxed">Relaxed</option>
            <option value="nostalgic">Nostalgic</option>
            <option value="in_love">In Love</option>
            <option value="energetic">Energetic</option>
            <option value="reflective">Reflective</option>
            <option value="sad">Sad</option>
            <option value="heartbroken">Heartbroken</option>
        </select>
    </div>

    <div>
        <label class="block text-cream/70 text-sm mb-1">Pesan / Cerita (opsional)</label>
        <textarea name="message" rows="4"
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel"></textarea>
    </div>

    <button type="submit"
        class="w-full bg-caramel text-espresso font-sans font-semibold py-3 rounded-lg hover:bg-caramel/90 transition">
        Kirim Request
    </button>

</form>

@push('scripts')
<script>
function copyQueueCode() {
    const code = document.getElementById('queueCode').innerText.trim();
    navigator.clipboard.writeText(code).then(() => {
        const btn = document.getElementById('copyBtn');
        const original = btn.innerText;
        btn.innerText = '✅ Tersalin!';
        setTimeout(() => btn.innerText = original, 2000);
    });
}
</script>
@endpush

@endsection