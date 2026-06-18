@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<h1>Admin Dashboard</h1>

<form action="{{ route('logout') }}" method="POST" style="margin-bottom: 20px;">
    @csrf
    <button type="submit">Logout</button>
</form>

<div style="display: flex; gap: 20px; margin-bottom: 20px;">
    <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
        <strong>Total Request</strong>
        <p style="font-size: 24px;">{{ $totalRequests }}</p>
    </div>
    <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
        <strong>Queued</strong>
        <p style="font-size: 24px;">{{ $totalQueued }}</p>
    </div>
    <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
        <strong>Playing</strong>
        <p style="font-size: 24px;">{{ $totalPlaying }}</p>
    </div>
    <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px;">
        <strong>Played</strong>
        <p style="font-size: 24px;">{{ $totalPlayed }}</p>
    </div>
</div>

<p><a href="{{ route('admin.requests') }}">📋 Lihat Semua Request</a></p>

@endsection