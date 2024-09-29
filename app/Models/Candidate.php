<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'event_id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'usia', 
        'daerah', 'hobi', 'bakat', 'link', 'image', 'jml_vote'
    ];
}
