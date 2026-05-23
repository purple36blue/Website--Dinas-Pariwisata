<div class="modal fade" id="kulinerModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="modalTitle">Tambah Data Kuliner</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="kulinerForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input type="text" name="nama" id="nama" class="form-control mb-2" placeholder="Nama">

                    <input type="text" name="bahan_utama" id="bahan_utama" class="form-control mb-2" placeholder="Bahan Dasar Kuliner">

                    <input type="text" name="jenis" id="jenis" class="form-control mb-2" placeholder="Jenis">

                    <input type="text" name="video" id="video" class="form-control mb-2" placeholder="Link Video...">

                    <textarea name="deskripsi" id="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

                    <input type="file" name="foto" id="foto" class="form-control" placeholder="Foto">
                    <img id="previewGambar" src="" class="gambar mt-2" style="max-width: 100%; display:none;">

                </div>

                <div class="modal-footer">
                    <button type="submit" id="submitBtn" class="btn btn-simpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>

            </form>

        </div>
    </div>
</div>