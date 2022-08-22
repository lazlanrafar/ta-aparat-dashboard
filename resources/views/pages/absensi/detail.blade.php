@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Absensi Detail</h1>
                    <a href="/absensi-detail/{{ $id_absensi }}" target="_BLANK">Link untuk Absensi <i
                            class="fa fa-link"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/absensi">Absensi</a></li>
                        <li class="breadcrumb-item active">Detail Absensi</li>
                    </ol>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="/absensi-detail-print/{{ $id_absensi }}" class="btn btn-primary" target="_BLANK">
                                <i class="fa fa-print"></i>
                                print
                            </a>
                            <table id="defaultTable" class="table table-bordered table-striped">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
