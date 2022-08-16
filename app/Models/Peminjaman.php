<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_ruangan',
        'tgl_pinjam',
        'tgl_booking',
        'jam_mulai',
        'jam_selesai',
        'jumlah_peserta',
        'agenda',
        'status_approv1',
        'status_approv2',
    ];
}
