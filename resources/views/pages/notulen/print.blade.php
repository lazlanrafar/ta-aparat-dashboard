@extends('layouts.guest')
@section('content')
    <div class="container mt-5">
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
