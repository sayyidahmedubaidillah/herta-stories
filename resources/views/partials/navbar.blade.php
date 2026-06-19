<nav class="bg-[#1F130D] border-b border-caramel/20 px-4 py-4">
    <div class="max-w-2xl mx-auto flex items-center justify-between">
        <a href="/" class="font-display text-xl text-cream tracking-wide">Herta Stories</a>
        <div class="flex gap-4 font-sans text-sm">
            <a href="/" class="text-cream/80 hover:text-caramel transition">Home</a>
            <a href="{{ route('request.create') }}" class="text-cream/80 hover:text-caramel transition">Request</a>
            <a href="{{ route('queue') }}" class="text-cream/80 hover:text-caramel transition">Queue</a>
            <a href="{{ route('my-request.form') }}" class="text-cream/80 hover:text-caramel transition">Cek Request</a>
        </div>
    </div>
</nav>