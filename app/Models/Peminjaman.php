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
        'status',
        'status_approv1',
        'status_approv2',
        'keterangan',
    ];

    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan', 'id_ruangan');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
