@extends('layouts.guest')
@section('content')
    <div class="container mt-5">
    <div class="row py-3">
            <div class="col-2">
                <img src="{{ url('/logo.png') }}" alt="Logo" width="100" />
            </div>
            <div class="col-8 text-center" style="font-family: 'Times New Roman', Times, serif">
                <h2><b>PEMERINTAH KOTA BATAM <br> SEKRETARIAT DAERAH KOTA BATAM</b></h2>
                <p>Jl. Engku Putri No. 1 Telp. (0778) 462164, Fax. (0778) 461349
                    BATAM
                </p>
            </div>
            <div class="col-2 align-self-end">
                Kode Pos : 29464
            </div>
        </div>
        <hr>
        <h3 class="text-center"><b>NOTULEN RAPAT</b></h3>
        <div class="my-5">
            <table>
                <tr>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td>{{ $data->tgl_notulen }}</td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td>:</td>
                    <td>{{ $data->jam_mulai }} sd {{ $data->jam_selesai }}</td>
                </tr>
                <tr>
                    <th>Tempat</th>
                    <td>:</td>
                    <td>{{ $data->tempat }}</td>
                </tr>
                <tr>
                    <th>Acara</th>
                    <td>:</td>
                    <td>{{ $data->agenda }}</td>
                </tr>
            </table>
            <br>
            <hr>
            <br>
            <p><b>Pembahasan</b></p>
            <p>{!! $data->isi_notulen !!}</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
@endsection
