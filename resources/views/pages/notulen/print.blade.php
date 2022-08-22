@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="my-5">
            <table>
                <tr>
                    <th>Agenda</th>
                    <td>:</td>
                    <td>{{ $data->agenda }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td>{{ $data->tgl_notulen }}</td>
                </tr>
            </table>
            <hr>
            <p><b>Isi Notulen</b></p>
            <p>{{ $data->isi_notulen }}</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
@endsection
