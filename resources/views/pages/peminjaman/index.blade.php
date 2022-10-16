@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($level == 'Pegawai')
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#formCreate"><i
                                        class="fa fa-plus"></i> Tambah</a>
                                @include('pages.peminjaman.create')
                            @endif
                            @if ($level == 'Administrasi Umum')
                            <form action="/peminjaman" method="POST" class="mb-5">
                                @csrf
                                <div class="row align-items-end justify-content-center justify-content-md-start mb-md-3">
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group mb-md-0">
                                            <label for="">Tanggal Awal</label>
                                            <input type="datetime-local" class="form-control" name="from_date" required
                                                id="dari_tanggal" value="{{ $from_date }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group mb-md-0">
                                            <label for="">Tanggal Akhir</label>
                                            <input type="datetime-local" class="form-control" name="end_date" required
                                                id="sampai_tanggal" value="{{ $end_date }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group mb-md-0">
                                            <label for="">Ruangan</label>
                                            <select class="form-control" id="ruang_rapat" name="ruang_rapat" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach ($list_ruangan as $l)
                                        <option value="{{ $l->id }}" <?php if ($l->id == $ruang_rapat): echo 'selected'; ?>
                                        <?php endif ?>>
                                            {{ $l->nama_ruangan }}
                                        </option>
                                    @endforeach
                                </select>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-1 mb-3 mb-md-0">
                                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-1 mb-3 mb-md-0">
                                        <a href="/peminjaman" class="btn btn-danger w-100">reset</a>
                                    </div>
                                </div>
                            </form>
                            @endif
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nama Ruangan</th>
                                        <th>Agenda</th>
                                        <th>Tanggal Booking</th>
                                        <th>Waktu Rapat</th>
                                        <th>Status</th>
                                        <th>Status Apv 1</th>
                                        <th>Status Apv 2</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items_menunggu as $item)
                                        @include('pages.peminjaman.table', [
                                            'i' => $i,
                                            'item' => $item
                                            ])
                                            <?php $i++; ?>
                                    @endforeach
                                    @foreach ($items_diverifikasi as $item)
                                        @include('pages.peminjaman.table', [
                                            'i' => $i,
                                            'item' => $item
                                            ])
                                            <?php $i++; ?>
                                    @endforeach
                                    @foreach ($items_ditolak as $item)
                                        @include('pages.peminjaman.table', [
                                            'i' => $i,
                                            'item' => $item
                                            ])
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
