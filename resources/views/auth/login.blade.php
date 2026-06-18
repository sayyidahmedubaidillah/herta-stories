@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')

<h1>Login Admin</h1>

@if ($errors->any())
    <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('login.attempt') }}" method="POST">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <br>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <br>

    <button type="submit">Login</button>
</form>

@endsection