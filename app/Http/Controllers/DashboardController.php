<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Ruangan;

class DashboardController extends Controller
{
    public function index(){
        $items = Peminjaman::where('status', '=', 'Diverifikasi')
        ->where('status_approv1', '=', 'Disetujui')
        ->where('status_approv2', '=', 'Disetujui')
        ->get();

        $total_pegawai = User::all()->count();
        $total_ruangan = Ruangan::all()->count();
        $total_peminjaman = Peminjaman::all()->count();

        return view('pages.dashboard.index', [
            'items' => $items,
            'total_pegawai' => $total_pegawai,
            'total_ruangan' => $total_ruangan,
            'total_peminjaman' => $total_peminjaman
        ]);
    }
}
