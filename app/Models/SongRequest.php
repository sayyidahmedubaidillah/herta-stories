<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SongRequest extends Model
{
    protected $fillable = [
        'queue_code',
        'requester_name',
        'song_title',
        'artist_name',
        'mood',
        'message',
        'status'
    ];
}