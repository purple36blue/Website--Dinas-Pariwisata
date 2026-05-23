<div class="modal fade" id="acaraModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 id="modalTitle">Tambah Data Acara</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form id="acaraForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="container-fluid">

                        <!-- Nama -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Acara</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control"
                                    placeholder="Masukkan nama acara">
                            </div>
                        </div>

                        <!-- Lokasi & Koordinat -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control"
                                    placeholder="Masukkan lokasi">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Koordinat</label>
                                <input type="text" name="koordinat" id="koordinat"
                                    class="form-control"
                                    placeholder="Contoh: -1.2345,120.5678">
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="mulai" id="mulai"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" name="akhir" id="akhir"
                                    class="form-control">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Masukkan deskripsi acara"></textarea>
                            </div>
                        </div>

                        <!-- Upload Foto -->
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Foto Acara</label>
                                <input type="file" name="foto" id="foto"
                                    class="form-control">
                            </div>

                            <div class="col-md-12 text-center">
                                <img id="previewGambar"
                                    src=""
                                    class="gambar mt-2"
                                    style="display:none;">
                            </div>
                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="submit" id="submitBtn" class="btn btn-simpan">
                        Simpan
                    </button>

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>