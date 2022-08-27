@extends('layouts.guest')
@section('content')
    <form action="/absensi-detail" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="id_absensi" value="{{ $id_absensi }}">
        <div class="container" style="max-width: 700px">
            <div class="card">
                <div class="card-header">
                    <h3>Absen untuk Agenda {{ $data->agenda }}</h3>
                    <p>yang dilakukan di ruangan {{ $data->nama_ruangan }} pada tanggal {{ $data->tanggal }} dari
                        {{ $data->jam_mulai }} sd {{ $data->jam_selesai }}</p>

                    <div class="row">
                        @include('includes.error-card')
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nip">NIP*</label>
                                <input type="number" class="form-control" id="nip" placeholder="Masukan NIP"
                                    name="nip" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama"
                                    name="nama" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jabatan">Jabatan*</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Masukan Jabatan"
                                    name="jabatan" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ttd">Tanda Tangan*</label>
                                <input type="hidden" class="form-control" id="ttd" placeholder="Masukan Tanda Tangan"
                                    name="ttd" required />
                                <br>
                                <canvas class="border" onclick="handleTTD()"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
