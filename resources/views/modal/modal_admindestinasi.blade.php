<div class="modal fade" id="destinasiModal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 id="modalTitle">Tambah Data Destinasi</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form id="destinasiForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="container-fluid">

                        <!-- Nama -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Destinasi</label>

                                <input type="text"
                                    name="nama"
                                    id="nama"
                                    class="form-control"
                                    placeholder="Masukkan nama destinasi">
                            </div>
                        </div>

                        <!-- Lokasi & Jenis -->
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi</label>

                                <input type="text"
                                    name="lokasi"
                                    id="lokasi"
                                    class="form-control"
                                    placeholder="Masukkan lokasi wisata">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Wisata</label>

                                <input type="text"
                                    name="jenis"
                                    id="jenis"
                                    class="form-control"
                                    placeholder="Contoh: Pantai, Air Terjun, Pegunungan">
                            </div>

                        </div>

                        <!-- Jam Operasional & Harga -->
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jam Operasional</label>

                                <input type="text"
                                    name="jam_operasional"
                                    id="jam_operasional"
                                    class="form-control"
                                    placeholder="Contoh: 08:00 - 17:00">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga Tiket</label>

                                <input type="text"
                                    name="harga"
                                    id="harga"
                                    class="form-control"
                                    placeholder="Contoh: Rp10.000">
                            </div>

                        </div>

                    <div class="row">
                        <!-- Fasilitas & Kategori -->
                        <div class="col-md-5 mb-3">

                            <label class="form-label">Fasilitas</label>

                            <div class="fasilitas-wrapper">

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Spot Foto">
                                    <i class="bi bi-camera-fill"></i>
                                    Spot Foto
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Area Picnic">
                                    <i class="bi bi-tree-fill"></i>
                                    Area Picnic
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Tempat Makan">
                                    <i class="bi bi-cup-hot-fill"></i>
                                    Tempat Makan
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="WiFi Area">
                                    <i class="bi bi-wifi"></i>
                                    WiFi Area
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Area Parkir">
                                    <i class="bi bi-car-front-fill"></i>
                                    Area Parkir
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Toilet Umum">
                                    <i class="bi bi-droplet-fill"></i>
                                    Toilet Umum
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Mushola">
                                    <i class="bi bi-moon-stars-fill"></i>
                                    Mushola
                                </label>

                                <label class="fasilitas-item">
                                    <input type="checkbox" name="fasilitas[]" value="Gazebo">
                                    <i class="bi bi-house-fill"></i>
                                    Gazebo
                                </label>

                            </div>

                        </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>

                                <input type="text"
                                    name="kategori"
                                    id="kategori"
                                    class="form-control"
                                    placeholder="Contoh: Gratis atau Berbayar">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Koordinat</label>

                                <input type="text"
                                    name="koordinat"
                                    id="koordinat"
                                    class="form-control"
                                    placeholder="Contoh: -1.2345,120.5678">
                            </div>

                    </div>
                        <!-- Deskripsi Singkat -->
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi Singkat</label>

                                <input type="text"
                                    name="deskripsi_singkat"
                                    id="deskripsi_singkat"
                                    class="form-control"
                                    placeholder="Masukkan deskripsi singkat">
                            </div>

                        </div>

                        <!-- Deskripsi -->
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Deskripsi Lengkap</label>

                                <textarea name="deskripsi"
                                    id="deskripsi"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Masukkan deskripsi lengkap destinasi"></textarea>
                            </div>

                        </div>

                        <!-- Upload Foto -->
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <label class="form-label">Foto Destinasi</label>

                                <input type="file"
                                    name="foto"
                                    id="foto"
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

                    <button type="submit"
                        id="submitBtn"
                        class="btn btn-simpan">
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