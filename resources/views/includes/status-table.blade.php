@if ($status == 'Menunggu')
    <span class="badge badge-warning text-white">{{ $status }}</span>
@elseif ($status == 'Ditolak')
    <span class="badge badge-danger">{{ $status }}</span>
@else
    <span class="badge badge-success">{{ $status }}</span>
@endif
