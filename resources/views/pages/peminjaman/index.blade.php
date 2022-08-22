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
                                        <th>Nama Ruangan</th>
                                        <th>Agenda</th>
                                        <th>Tanggal Booking</th>
                                        <th>Status</th>
                                        <th>Status Apv 1</th>
                                        <th>Status Apv 2</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->ruangan->nama_ruangan }}</td>
                                            <td>{{ $item->agenda }}</td>
                                            <td>{{ $item->tgl_booking }}</td>
                                            <td>
                                                @include('includes.status-table', [
                                                    'status' => $item->status,
                                                ])
                                            </td>
                                            <td>
                                                @include('includes.status-table', [
                                                    'status' => $item->status_approv1,
                                                ])
                                            </td>
                                            <td>
                                                @include('includes.status-table', [
                                                    'status' => $item->status_approv2,
                                                ])
                                            </td>
                                            <td>
                                                @if ($level == 'Pegawai' && $item->status == 'Menunggu')
                                                    <form id="formDelete{{ $item->id }}"
                                                        action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <a type="button" class="btn btn-danger"
                                                            onclick="handleDelete({{ $item->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </form>

                                                    <script>
                                                        function handleDelete(id) {
                                                            Swal.fire({
                                                                title: 'Apakah kamu yakin?',
                                                                text: "kamu akan menghapus data ini!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Ya, hapus!'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById('formDelete' + id).submit();
                                                                }
                                                            })
                                                        }
                                                    </script>
                                                @endif

                                                @if ($level == 'Administrasi Umum' && $item->status == 'Menunggu')
                                                    <a href="/peminjaman/{{ $item->id }}/status"
                                                        class="btn btn-primary">Konfirmasi</a>
                                                    <a href="/peminjaman/{{ $item->id }}/tolak"
                                                        class="btn btn-danger">Tolak</a>
                                                @elseif ($level == 'Kabag Umum' && $item->status_approv2 == 'Menunggu')
                                                    <a href="/peminjaman/{{ $item->id }}/status_approv2"
                                                        class="btn btn-primary">Konfirmasi</a>
                                                    <a href="/peminjaman/{{ $item->id }}/tolak"
                                                        class="btn btn-danger">Tolak</a>
                                                @elseif ($level == 'Kasubbag Kepegawaian' && $item->status_approv1 == 'Menunggu')
                                                    <a href="/peminjaman/{{ $item->id }}/status_approv1"
                                                        class="btn btn-primary">Konfirmasi</a>
                                                    <a href="/peminjaman/{{ $item->id }}/tolak"
                                                        class="btn btn-danger">Tolak</a>
                                                @endif

                                                @if ($item->status == 'Diverifikasi' &&
                                                    $item->status_approv1 == 'Disetujui' &&
                                                    $item->status_approv2 == 'Disetujui')
                                                    <a href="/peminjaman-print/{{ $item->id }}" target="_BLANK"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                @endif
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
