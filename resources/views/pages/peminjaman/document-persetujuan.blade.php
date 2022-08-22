@extends('layouts.guest')
@section('content')
    <div class="container">
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
        <h4 class="text-center my-5"><b>SURAT PERSETUJUAN PEMINJAMAN RUANG RAPAT</b></h4>
        <table>
            <tr>
                <td style="min-width: 100px">Nomor</td>
                <td style="min-width: 20px">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>Persetujuan Peminjaman Ruang Rapat</td>
            </tr>
        </table>
        <br>
        <p>
            Kepada Yth, <br>
            Kepala Bidang Statistika <br>
            di Tempat
        </p>
        <p>Dengan hormat,</p>
        <p>Berdasarkan dengan permohonan peminjaman ruang rapat pada tanggal 27 Juli 2022 perihal pelaksanaan “ Rapat
            Koordinasi Akhir Standarisasi “ pada :</p>
        <table class="ml-5">
            <tr>
                <td style="min-width: 100px">Tanggal</td>
                <td style="min-width: 20px">:</td>
                <td>{{ $data->tgl_booking }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $data->jam_mulai }} sd {{ $data->jam_selesai }}</td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>:</td>
                <td>{{ $data->ruangan->nama_ruangan }}</td>
            </tr>
            <tr>
                <td>Acara</td>
                <td>:</td>
                <td>{{ $data->agenda }}</td>
            </tr>
        </table>
        <br>
        <p>Untuk itu kami memberikan izin menggunakan ruang rapat tersebut. Kami juga akan memberikan dukungan penuh untuk
            kelancaran kegiatan tersebut.</p>
        <p>Demikian surat persetujuan ini kami buat agar dapat digunakan dengan sebagaimana mestinya. Atas perhatian kami
            ucapkan terima kasih.</p>

        <br><br>
        <div class="text-right">
            <p>Batam, {{ $date_now }}</p>
            <br>
            <br>
            <p>Kepala Bagian Umum</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
@endsection
