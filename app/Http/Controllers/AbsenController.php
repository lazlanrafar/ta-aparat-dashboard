<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Peminjaman;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Absensi::where('id_user', '=', auth()->user()->id)->get();

        return view('pages.absensi.index', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->all();
        $item['id_user'] = auth()->user()->id;

        Absensi::create($item);
        return redirect()->route('absensi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = AbsensiDetail::where('id_absensi', $id)->get();
        $id_absensi = $id;

        return view('pages.absensi.detail', [
            'items' => $items,
            'id_absensi' => $id_absensi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $items = AbsensiDetail::where('id_absensi', $id)->get();
        $data = Absensi::find($id);

        return view('pages.absensi.detail-print', [
            'items' => $items,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Absensi::find($id);
        $item->update($request->all());
        return redirect()->route('absensi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::find($id)->delete();
        return redirect()->route('absensi.index')->with('success', 'Data berhasil dihapus');
    }
}
