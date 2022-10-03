<!-- Modal -->
<div class="modal fade" id="formTolak{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formTolak{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/peminjaman/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formTolak{{ $item->id }}Label">
                        Tolak Peminjaman
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="keterangan">Keterangan Penolakan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukan keterangan"
                                rows="5" required></textarea>
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
