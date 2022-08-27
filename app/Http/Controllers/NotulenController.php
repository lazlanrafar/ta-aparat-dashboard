<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notulen;

class NotulenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Notulen::where('id_user', '=', auth()->user()->id)->get();

        return view('pages.notulen.index', [
            'items' => $items
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
        Notulen::create($item);
        return redirect()->route('notulen.index')->with('success', 'Data berhasil ditambahkan');
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
        $item = Notulen::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('notulen.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Notulen::findOrFail($id);
        $item->delete();
        return redirect()->route('notulen.index')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Notulen::findOrFail($id);
        return view('pages.notulen.print', [
            'data' => $data
        ]);
    }
}
