<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('ruang-rapat.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateLabel">
                        Peminjaman Ruangan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan"
                                    placeholder="Masukan Nama Ruangan" name="nama_ruangan" required />
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
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan"
                                    placeholder="Masukan Nama Ruangan" name="nama_ruangan" required />
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
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan"
                                    placeholder="Masukan Nama Ruangan" name="nama_ruangan" required />
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
                                <label for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan"
                                    placeholder="Masukan Nama Ruangan" name="nama_ruangan" required />
                            </div>
                        </div>
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
