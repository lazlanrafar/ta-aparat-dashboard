<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index(){
        $items = Peminjaman::all();

        return view('pages.laporan.index', [
            'items' => $items
        ]);
    }
}
