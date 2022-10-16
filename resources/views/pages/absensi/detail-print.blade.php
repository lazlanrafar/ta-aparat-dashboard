@extends('layouts.guest')
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h3>Daftar Absensi</h3>
        </div>
        <table>
            <tr>
                <td style="min-width: 150px">Nama Ruangan</td>
                <td style="min-width: 20px">:</td>
                <td>{{ $data->nama_ruangan }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $data->jam_mulai }} sd {{ $data->jam_selesai }}</td>
            </tr>
            <tr>
                <td>Agenda</td>
                <td>:</td>
                <td>{{ $data->agenda }}</td>
            </tr>
        </table>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>TTD</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>
                            <img src="{{ $item->ttd }}" width="100" alt="ttd">
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
@endsection
