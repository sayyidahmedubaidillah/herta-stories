@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')

<div class="mb-8 text-center">
    @include('partials.steam')
    <h1 class="font-display text-3xl text-cream mb-2">Login Admin</h1>
    <p class="text-cream/60 text-sm">Khusus untuk pengelola Herta Stories</p>
</div>

@if ($errors->any())
    <div class="bg-brick/20 border border-brick text-cream px-4 py-3 rounded-lg mb-6 text-sm">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('login.attempt') }}" method="POST" class="bg-[#1F130D] border border-caramel/20 rounded-xl p-6 space-y-5">
    @csrf

    <div>
        <label class="block text-cream/70 text-sm mb-1">Email</label>
        <input type="email" name="email" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel">
    </div>

    <div>
        <label class="block text-cream/70 text-sm mb-1">Password</label>
        <input type="password" name="password" required
            class="w-full bg-espresso border border-caramel/30 rounded-lg px-4 py-2 text-cream placeholder-cream/30 focus:outline-none focus:border-caramel">
    </div>

    <button type="submit"
        class="w-full bg-caramel text-espresso font-sans font-semibold py-3 rounded-lg hover:bg-caramel/90 transition">
        Login
    </button>

</form>

@endsection