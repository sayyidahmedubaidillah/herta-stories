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
            ->with('success', 'Request berhasil dikirim!')
            ->with('queue_code', $songRequest->queue_code);
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

    public function myRequestForm()
    {
        return view('my-request');
    }

    public function myRequestLookup(Request $request)
    {
        $request->validate([
            'queue_code' => 'required|string',
        ]);

        $songRequest = SongRequest::where('queue_code', strtoupper(trim($request->queue_code)))->first();

        if (!$songRequest) {
            return back()->withErrors([
                'queue_code' => 'Kode tidak ditemukan. Periksa kembali kode kamu.',
            ]);
        }

        return view('my-request', compact('songRequest'));
    }

    public function myRequestDelete(SongRequest $songRequest)
    {
        if (in_array($songRequest->status, ['playing', 'played'])) {
            return back()->withErrors([
                'queue_code' => 'Request ini sudah diproses dan tidak bisa dihapus.',
            ]);
        }

        $songRequest->delete();

        return redirect()->route('my-request.form')
            ->with('success', 'Request kamu berhasil dihapus.');
    }
}