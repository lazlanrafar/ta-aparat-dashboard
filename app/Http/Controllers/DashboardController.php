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

        $list_ruangan = Ruangan::all();

        $total_menunggu = Peminjaman::where('status', '=', 'Menunggu')
        ->where('status_approv1', '=', 'Menunggu')
        ->where('status_approv2', '=', 'Menunggu')
        ->count();
        $total_diproses = Peminjaman::where('status', '=', 'Diverifikasi')
        ->where('status_approv1', '!=', 'Disetujui')
        ->where('status_approv2', '!=', 'Disetujui')
        ->count();
        $total_disetujui = Peminjaman::where('status', '=', 'Diverifikasi')
        ->where('status_approv1', '=', 'Disetujui')
        ->where('status_approv2', '=', 'Disetujui')
        ->count();
        $total_ditolak = Peminjaman::where('status', '=', 'Ditolak')
        ->where('status_approv1', '=', 'Ditolak')
        ->where('status_approv2', '=', 'Ditolak')
        ->count();

        return view('pages.dashboard.index', [
            'items' => $items,
            'list_ruangan' => $list_ruangan,
            'total_menunggu' => $total_menunggu,
            'total_diproses' => $total_diproses,
            'total_disetujui' => $total_disetujui,
            'total_ditolak' => $total_ditolak
        ]);
    }
}
