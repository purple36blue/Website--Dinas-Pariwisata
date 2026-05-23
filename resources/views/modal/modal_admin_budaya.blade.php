<div class="modal fade" id="budayaModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="modalTitle">Tambah Data Budaya</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="budayaForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input type="text" name="nama" id="nama" class="form-control mb-2" placeholder="Masukan nama...">

                    <input type="text" name="jenis" id="jenis" class="form-control mb-2" placeholder="Jenis Budaya...">

                    <input type="text" name="video" id="video" class="form-control mb-2" placeholder="Link Video...">

                    <textarea name="deskripsi" id="deskripsi" class="form-control mb-2" placeholder="Masukan deskripsi terkait data"></textarea>

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