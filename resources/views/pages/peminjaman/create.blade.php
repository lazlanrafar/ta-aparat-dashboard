<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_user" value="{{ request()->session()->get('user')['id'] }}">
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
                                <label for="agenda">Agenda</label>
                                <input type="text" class="form-control" id="agenda" placeholder="Masukan Agenda"
                                    name="agenda" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jumlah_peserta">Jumlah Peserta</label>
                                <input type="number" class="form-control" id="jumlah_peserta"
                                    placeholder="Masukan Jumlah Peserta" name="jumlah_peserta" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_booking">Tanggal Booking</label>
                                <input type="date" class="form-control" id="tgl_booking"
                                    placeholder="Masukan Tanggal Booking" name="tgl_booking" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_ruangan">Ruangan</label>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected>-- pilih Ruangan --</option>
                                    @foreach ($list_ruangan as $l)
                                        <option value="{{ $l->id }}">
                                            {{ $l->nama_ruangan }} -
                                            {{ $l->kapasitas }} -
                                            {{ $l->lokasi }}
                                        </option>
                                    @endforeach
                                </select>
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
