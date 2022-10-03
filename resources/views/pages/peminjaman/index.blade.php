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
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nama Ruangan</th>
                                        <th>Agenda</th>
                                        <th>Tanggal Booking</th>
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
