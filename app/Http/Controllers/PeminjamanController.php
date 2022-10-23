<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;

use Mail;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_ruangan = Ruangan::all();
        $level = auth()->user()->level;

        if($level == 'Kasubbag Kepegawaian'){
            $items = Peminjaman::where('status', '!=', 'Menunggu')
                ->get();
        }else if($level == 'Kabag Umum'){
            $items = Peminjaman::where('status', '!=', 'Menunggu')
                ->where('status_approv1', '!=', 'Menunggu')
                ->get();
        } else if($level == 'Pegawai'){
            $items = Peminjaman::where('id_user', '=', auth()->user()->id)->get();
        } else {
            $items = Peminjaman::all();
        }

        $from_date = '';
        $end_date = '';
        $ruang_rapat = '';

        return view('pages.peminjaman.index', [
            'items_menunggu' => $items->where('status', 'Menunggu'),
            'items_diverifikasi' => $items->where('status', 'Diverifikasi'),
            'items_ditolak' => $items->where('status', 'Ditolak'),
            'list_ruangan' => $list_ruangan,
            'level' => $level,
            'ruang_rapat' => $ruang_rapat,
            'from_date' => $from_date,
            'end_date' => $end_date
        ]);
    }

    public function filter(Request $request){
        $list_ruangan = Ruangan::all();
        $level = auth()->user()->level;

        $from_date = $request->from_date;
        $end_date = $request->end_date;
        $ruangrapat = $request->ruang_rapat;
        $items = Peminjaman::whereBetween('tgl_booking', [$from_date, $end_date])
            ->where('id_ruangan', '=', $ruangrapat)
            ->get();
        return view('pages.peminjaman.index', [
            'items_menunggu' => $items->where('status', 'Menunggu'),
            'items_diverifikasi' => $items->where('status', 'Diverifikasi'),
            'items_ditolak' => $items->where('status', 'Ditolak'),
            'list_ruangan' => $list_ruangan,
            'ruang_rapat' => $ruangrapat,
            'level' => $level,
            'from_date' => $from_date,
            'end_date' => $end_date
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
        $data = $request->all();
        $data['status'] = 'Menunggu';
        $data['status_approv1'] = 'Menunggu';
        $data['status_approv2'] = 'Menunggu';

        Peminjaman::create($data);

        $adminumum = User::where('level', 'Administrasi Umum')->first();
        $email = $adminumum->email;
        $subject = 'Peminjaman Ruangan Rapat';
        $message = 'Ada peminjaman ruangan rapat yang menunggu persetujuan anda. Silahkan login ke aplikasi untuk memeriksa peminjaman tersebut.';
        $result = Peminjaman::orderBy('id', 'desc')->first();

        Mail::send('email.to-admin', ['data' => $result, 'adminumum' => $adminumum], function($message) use ($email,
            $subject) {
            $message->to($email)->subject($subject);
        });

        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($id, $status)
    {
        $item = Peminjaman::find($id);
        
        if($status == 'tolak'){
            $item->status = 'Ditolak';
            $item->status_approv1 = 'Ditolak';
            $item->status_approv2 = 'Ditolak';
        }

        if($status == 'status'){
            $item->status = 'Diverifikasi';
        }
        if($status == 'status_approv1'){
            $item->status_approv1 = 'Disetujui';
        }
        if($status == 'status_approv2'){
            $item->status_approv2 = 'Disetujui';
        }

        $item->save();

        if($status == 'status'){
            $kasubbag = User::where('level', 'Kasubbag Kepegawaian')->first();
            $email = $kasubbag->email;
            $subject = 'Peminjaman Ruangan Rapat';
            $message = 'Ada peminjaman ruangan rapat yang menunggu persetujuan anda. Silahkan login ke aplikasi untuk memeriksa peminjaman tersebut.';

            Mail::send('email.to-kasubbag', ['data' => $item, 'nama' => $kasubbag->nama, 'status' => $status], function($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        }

        if($status == 'status_approv1'){
            $kasubbag = User::where('level', 'Kabag Umum')->first();
            $email = $kasubbag->email;
            $subject = 'Peminjaman Ruangan Rapat';
            $message = 'Ada peminjaman ruangan rapat yang menunggu persetujuan anda. Silahkan login ke aplikasi untuk memeriksa peminjaman tersebut.';

            Mail::send('email.to-kasubbag', ['data' => $item, 'nama' => $kasubbag->nama], function($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        }
        
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil disetujui');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $data = Peminjaman::find($id);
        $date_now = date('d F Y');

        return view('pages.peminjaman.document-persetujuan', [
            'data' => $data,
            'date_now' => $date_now
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peminjaman::find($id)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $item = $request->all();
        $item['status'] = 'Ditolak';
        $item['status_approv1'] = 'Ditolak';
        $item['status_approv2'] = 'Ditolak';

        $data = Peminjaman::find($id);
        $data->update($item);
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditolak');
    }
}
