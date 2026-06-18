@extends('layouts.app')

@section('title', 'Kelola Request')

@section('content')

<h1>Kelola Request</h1>

<p><a href="{{ route('admin.dashboard') }}">⬅ Kembali ke Dashboard</a></p>

@if (session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="8" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Judul Lagu</th>
            <th>Penyanyi</th>
            <th>Requester</th>
            <th>Mood</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $req)
            <tr>
                <td>{{ $req->queue_code }}</td>
                <td>{{ $req->song_title }}</td>
                <td>{{ $req->artist_name }}</td>
                <td>{{ $req->requester_name }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $req->mood)) }}</td>
                <td>{{ ucfirst($req->status) }}</td>
                <td>
                    <form action="{{ route('admin.requests.updateStatus', $req->id) }}" method="POST" style="display:flex; gap:5px;">
                        @csrf
                        @method('PATCH')
                        <select name="status">
                            <option value="queued" @selected($req->status === 'queued')>Queued</option>
                            <option value="playing" @selected($req->status === 'playing')>Playing</option>
                            <option value="played" @selected($req->status === 'played')>Played</option>
                            <option value="cancelled" @selected($req->status === 'cancelled')>Cancelled</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection