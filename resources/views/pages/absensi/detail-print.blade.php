@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="text-center">
            <h3>Absen untuk Agenda {{ $data->peminjaman->agenda }}</h3>
            <p>yang dilakukan pada tanggal {{ $data->peminjaman->tgl_booking }} dari
                {{ $data->peminjaman->jam_mulai }} sd {{ $data->peminjaman->jam_selesai }}</p>
        </div>
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
