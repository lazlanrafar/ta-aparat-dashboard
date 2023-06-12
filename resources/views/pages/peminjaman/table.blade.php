<tr>
    <td>{{ $i }}</td>
    <td>{{ $item->created_at }}</td>
    <td>
        {{ $item->user->nama }} -
        {{ $item->user->jabatan }}
    </td>
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
        @if ($item->keterangan)
            {{ $item->keterangan }}
        @else
            -
        @endif
    </td>
    <td>
        @if ($level == 'Pegawai' && $item->status == 'Menunggu')
            <form id="formDelete{{ $item->id }}" action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
                class="d-inline">
                @csrf
                @method('delete')
                <a type="button" class="btn btn-danger" onclick="handleDelete({{ $item->id }})" title="Hapus">
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
            <a onclick="handleKonfirmasi('/peminjaman/{{ $item->id }}/status')" class="btn btn-primary"
                title="verifikasi"><i class="fa fa-check"></i></a>
        @elseif ($level == 'Kabag Umum' && $item->status_approv2 == 'Menunggu')
            <a onclick="handleKonfirmasi('/peminjaman/{{ $item->id }}/status_approv2')" class="btn btn-primary"
                title="Setujui"><i class="fa fa-check"></i></a>
        @elseif ($level == 'Kasubbag Kepegawaian' && $item->status_approv1 == 'Menunggu')
            <a onclick="handleKonfirmasi('/peminjaman/{{ $item->id }}/status_approv1')" class="btn btn-primary"
                title="Setujui"><i class="fa fa-check"></i>Konfirmasi</a>
        @elseif ($level == 'Kabag Umum' && $item->status_approv2 == 'Menunggu')
            <a onclick="handleKonfirmasi('/peminjaman/{{ $item->id }}/status_approv2')"
                class="btn btn-primary">Konfirmasi</a>
        @elseif ($level == 'Kasubbag Kepegawaian' && $item->status_approv1 == 'Menunggu')
            <a onclick="handleKonfirmasi('/peminjaman/{{ $item->id }}/status_approv1')"
                class="btn btn-primary">Konfirmasi</a>
        @endif

        <script>
            function handleKonfirmasi(url) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "kamu akan mengkonfirmasi peminjaman ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, konfirmasi!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url
                    }
                })
            }
        </script>

        @if ($level != 'Pegawai')
            @if ($item->status == 'Menunggu' || $item->status_approv1 == 'Menunggu' || $item->status_approv2 == 'Menunggu')
                <a type="button" class="btn btn-danger" data-toggle="modal" <<<<<<< HEAD
                    data-target="#formTolak{{ $item->id }}" title="Tolak"><i class="fa fa-ban"></i>
                Tolak</a>
                @include('pages.peminjaman.tolak-modal')
            @endif
        @endif

        @if ($item->status == 'Diverifikasi' &&
            $item->status_approv1 == 'Disetujui' &&
            $item->status_approv2 == 'Disetujui')
            <a href="/peminjaman-print/{{ $item->id }}" target="_BLANK" <<<<<<< HEAD class="btn btn-primary"
                title="Cetak">
                <i class="fa fa-print"></i>
            </a>
        @endif
    </td>
</tr>
