<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'tgl_notulen',
        'agenda',
        'isi_notulen',
        'jam_mulai',
        'jam_selesai',
        'tempat',
    ];
}
