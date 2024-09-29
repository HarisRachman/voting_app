<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'organizer_id', 'title', 'slug', 'image', 'tag', 'deskripsi', 'awal_vote', 'akhir_vote', 
        'harga_vote', 'venue', 'lokasi', 'link', 'tanggal_acara', 'waktu_awal', 'waktu_akhir'
    ];
}
