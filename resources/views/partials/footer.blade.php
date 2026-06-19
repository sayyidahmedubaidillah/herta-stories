<footer class="border-t border-caramel/20 px-4 py-8 mt-auto">
    <div class="max-w-2xl mx-auto text-center space-y-4">

        <p class="font-display text-lg text-cream/80">Herta Stories</p>
        <p class="text-cream/40 text-xs max-w-xs mx-auto">
            Setiap lagu punya cerita. Terima kasih sudah berbagi ceritamu bersama kami.
        </p>

        <div class="flex justify-center" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-caramel/40">
                <path d="M16 4C9 4 4 10 4 17c0 7 5 11 12 11s12-4 12-11C28 10 23 4 16 4z" stroke="currentColor" stroke-width="1.5"/>
                <path d="M16 5c-3 5-3 9 0 12s3 7 0 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </div>

        <div class="flex justify-center gap-4 text-xs text-cream/50">
            <a href="{{ route('request.create') }}" class="hover:text-caramel transition">Request</a>
            <a href="{{ route('queue') }}" class="hover:text-caramel transition">Queue</a>
            <a href="{{ route('my-request.form') }}" class="hover:text-caramel transition">Cek Request</a>
        </div>

        <p class="text-cream/30 text-xs">
            © {{ date('Y') }} 4123051 | sayyid ahmed ubaidillah ·
            <a href="{{ route('login') }}" class="hover:text-caramel/60 transition">Admin</a>
        </p>

    </div>
</footer>