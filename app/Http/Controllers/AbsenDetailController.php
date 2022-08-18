<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\AbsensiDetail;

class AbsenDetailController extends Controller
{
    public function index($id)
    {
        $data = Absensi::find($id);
        $id_absensi = $id;

        return view('pages.absensi.guest.index', [
            'data' => $data,
            'id_absensi' => $id_absensi
        ]);
    }

    public function store(Request $request)
    {
        AbsensiDetail::create($request->all());
        return redirect()->route('absensi-detail', $request->id_absensi)->with('success', 'Absensi berhasil ditambahkan !');
    }
}
