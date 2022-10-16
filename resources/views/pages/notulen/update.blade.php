<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('notulen.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateLabel">
                        Update Notulen
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl_notulen">Tanggal Notulen</label>
                        <input type="date" class="form-control" id="tgl_notulen"
                            placeholder="Masukan Tanggal Notulen" name="tgl_notulen" required
                            value="{{ $item->tgl_notulen }}" />
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" id="tempat"
                            placeholder="Masukan Tempat" name="tempat" required value="{{ $item->tempat }}" />
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="jam_mulai">Waktu Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai"
                                placeholder="Masukan Waktu Mulai" name="jam_mulai" required value="{{ $item->jam_mulai }}" />
                        </div>
                        <div class="form-group col-6">
                            <label for="jam_selesai">Waktu Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai"
                                placeholder="Masukan Waktu Selesai" name="jam_selesai" required value="{{ $item->jam_selesai }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agenda">Agenda Acara</label>
                        <textarea class="form-control" name="agenda" id="agenda" rows="3" placeholder="Masukan Agenda Acara">{{ $item->agenda }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="isi_notulen">Isi Notulen</label>
                        <textarea class="form-control ckeditor" name="isi_notulen" id="isi_notulen" rows="5" placeholder="Masukan Isi Notulen">{{ $item->isi_notulen }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
