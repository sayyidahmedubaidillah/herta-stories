<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongRequest;
use Illuminate\Support\Str;

class SongRequestController extends Controller
{
    public function create()
    {
        return view('request');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'requester_name' => 'required|string|max:255',
            'song_title'      => 'required|string|max:255',
            'artist_name'     => 'required|string|max:255',
            'mood'            => 'required|in:happy,relaxed,nostalgic,in_love,energetic,reflective,sad,heartbroken',
            'message'         => 'nullable|string',
        ]);

        $validated['queue_code'] = 'HS-' . strtoupper(Str::random(6));

        $songRequest = SongRequest::create($validated);

        return redirect()->route('request.create')
            ->with('success', 'Request berhasil dikirim! Kode antrian kamu: ' . $songRequest->queue_code);
    }

    public function queue()
    {
        $queue = SongRequest::where('status', 'queued')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('queue', compact('queue'));
    }
    public function display()
    {  
    $nowPlaying = SongRequest::where('status', 'playing')
        ->latest()
        ->first();

    $upNext = SongRequest::where('status', 'queued')
        ->orderBy('created_at', 'asc')
        ->take(5)
        ->get();

    return view('display', compact('nowPlaying', 'upNext'));
    }
}