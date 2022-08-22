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

        $from_date = '';
        $end_date = '';

        return view('pages.laporan.index', [
            'items' => $items,
            'from_date' => $from_date,
            'end_date' => $end_date
        ]);
    }

    public function filter(Request $request){
        $from_date = $request->from_date;
        $end_date = $request->end_date;
        $items = Peminjaman::whereBetween('created_at', [$from_date, $end_date])
            ->where('status', '=', 'Diverifikasi')
            ->where('status_approv1', '=', 'Disetujui')
            ->where('status_approv2', '=', 'Disetujui')
            ->get();
        return view('pages.laporan.index', [
            'items' => $items,
            'from_date' => $from_date,
            'end_date' => $end_date
        ]);
    }
}
