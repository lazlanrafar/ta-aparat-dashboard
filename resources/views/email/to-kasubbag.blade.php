<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Format Email</title>
</head>

<body>
    <p>Yth {{ $nama }}</p>
    <p>
        Terdapat pegawai yang mengajukan peminjaman ruang rapat sebagai
        berikut:
    </p>

    <table>
        <tr>
            <td>Nama Pegawai</td>
            <td>:</td>
            <td>{{ $data->user->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $data->user->nip }}</td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td>{{ $data->tgl_booking }}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>{{ $data->jam_mulai }} sd {{ $data->jam_selesai }}</td>
        </tr>
        <tr>
            <td>Ruang Rapat</td>
            <td>:</td>
            <td>{{ $data->ruangan->nama_ruangan }}</td>
        </tr>
        <tr>
            <td>Agenda</td>
            <td>:</td>
            <td>{{ $data->agenda }}</td>
        </tr>
    </table>

    @if ($status = 'status')
        <p>
            Administrasi Umum telah memverifikasi peminjaman tersebut, silahkan memberikan Persetujuan untuk peminjaman
            di atas melalui aplikasi APARAT.
            Demikian disampaikan dan terima kasih.
        </p>
    @endif
    @if ($status = 'status_approv1')
        <p>
            Kepala Sub Bagian Kepegawaian telah menyetuji peminjaman tersebut, silahkan memberikan Persetujuan untuk
            peminjaman di atas melalui aplikasi APARAT.
            Demikian disampaikan dan terima kasih.
        </p>
    @endif
    <p>Salam,</p>
    <p>Notifikasi APARAT</p>
</body>

</html>
