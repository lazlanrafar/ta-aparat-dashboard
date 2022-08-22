<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index(){
        $items = Peminjaman::where('status', '=', 'Diverifikasi')
            ->where('status_approv1', '=', 'Disetujui')
            ->where('status_approv2', '=', 'Disetujui')
            ->get();

        return view('pages.laporan.index', [
            'items' => $items
        ]);
    }
}
