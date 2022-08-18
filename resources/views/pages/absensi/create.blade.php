<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateLabel">
                        Tambah Absensi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_peminjaman">Peminjaman</label>
                        <select class="form-control" id="id_peminjaman" name="id_peminjaman" required>
                            <option value="" selected>-- pilih Peminjaman --</option>
                            @foreach ($list_peminjaman as $l)
                                <option value="{{ $l->id }}">
                                    {{ $l->tgl_booking }} /
                                    {{ $l->agenda }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_absensi">Tanggal Absensi</label>
                        <input type="date" class="form-control" id="tgl_absensi"
                            placeholder="Masukan Tanggal Absensi" name="tgl_absensi" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
