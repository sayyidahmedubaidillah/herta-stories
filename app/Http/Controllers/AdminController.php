<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalRequests = SongRequest::count();
        $totalQueued   = SongRequest::where('status', 'queued')->count();
        $totalPlaying  = SongRequest::where('status', 'playing')->count();
        $totalPlayed   = SongRequest::where('status', 'played')->count();

        return view('admin.dashboard', compact(
            'totalRequests', 'totalQueued', 'totalPlaying', 'totalPlayed'
        ));
    }

    public function requests()
    {
        $requests = SongRequest::orderBy('created_at', 'asc')->get();

        return view('admin.requests', compact('requests'));
    }

    public function updateStatus(Request $request, SongRequest $songRequest)
    {
        $request->validate([
            'status' => 'required|in:queued,playing,played,cancelled',
        ]);

        $songRequest->update(['status' => $request->status]);

        return back()->with('success', 'Status berhasil diubah.');
    }
}