<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="agenda">Agenda</label>
                                <input type="text" class="form-control" id="agenda" placeholder="Masukan Agenda"
                                    name="agenda" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan"
                                placeholder="Masukan Nama Ruangan" name="nama_ruangan" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal"
                                    placeholder="Masukan Tanggal" name="tanggal" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai"
                                    placeholder="Masukan Jam Mulai" name="jam_mulai" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai"
                                    placeholder="Masukan Jam Selesai" name="jam_selesai" required />
                            </div>
                        </div>
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
