<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'candidate_id', 'nama_voter', 'telp_voter', 'jml_vote', 'status'
    ];
}
