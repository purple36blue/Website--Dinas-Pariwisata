<div class="modal fade" id="pegawaiModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <div>
                    <h5 id="modalTitle" class="modal-title">
                        Tambah Data Pegawai
                    </h5>

                    <small class="modal-subtitle">
                        Lengkapi informasi data pegawai
                    </small>
                </div>

                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form id="pegawaiForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="container-fluid">

                        <!-- NAMA -->
                        <div class="row">
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Nama Pegawai
                                </label>

                                <input type="text"
                                    name="nama"
                                    id="nama"
                                    class="form-control"
                                    placeholder="Masukkan nama pegawai">

                            </div>
                        </div>

                        <!-- NIP & JABATAN -->
                        <div class="row">

                            <!-- NIP -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    NIP Pegawai
                                </label>

                                <input type="text"
                                    name="nip"
                                    id="nip"
                                    class="form-control"
                                    placeholder="Masukkan 18 digit NIP"
                                    maxlength="18"
                                    minlength="18"
                                    pattern="[0-9]{18}"
                                    inputmode="numeric"
                                    required>

                                <small class="text-muted" id="nipInfo">
                                    NIP harus terdiri dari 18 digit angka
                                </small>

                            </div>

                            <!-- JABATAN -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Jabatan
                                </label>

                                <input type="text"
                                    name="jabatan"
                                    id="jabatan"
                                    class="form-control"
                                    placeholder="Contoh: Kepala Dinas">

                            </div>

                        </div>

                        <!-- FOTO -->
                        <div class="row">

                            <div class="col-md-12 mb-2">

                                <label class="form-label">
                                    Foto Pegawai
                                </label>

                                <input type="file"
                                    name="foto"
                                    id="foto"
                                    class="form-control"
                                    accept="image/*">

                            </div>

                            <!-- PREVIEW -->
                            <div class="col-md-12 text-center">

                                <img id="previewGambar"
                                    src=""
                                    class="gambar-preview mt-3"
                                    style="display:none; width: 100px;">

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-batal"
                        data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                        id="submitBtn"
                        class="btn btn-simpan">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>