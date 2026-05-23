function openAddModal() {
    document.getElementById("modalTitle").innerText = "Tambah Destinasi";
    document.getElementById("destinasiForm").action = "/store_destinasi";

    document.getElementById("nama").value = "";
    document.getElementById("lokasi").value = "";
    document.getElementById("jenis").value = "";
    document.getElementById("jam_operasional").value = "";
    document.getElementById("harga").value = "";
    document.getElementById("kategori").value = "";
    document.getElementById("koordinat").value = "";
    document.getElementById("deskripsi").value = "";
    document.getElementById("deskripsi_singkat").value = "";

    document.querySelectorAll('input[name="fasilitas[]"]').forEach(item => {
        item.checked = false;
    });

    document.getElementById("previewGambar").style.display = "none";
    document.getElementById("submitBtn").innerText = "Simpan";
}

function openEditModal(data) {
    document.getElementById("modalTitle").innerText = "Edit Destinasi";
    document.getElementById("destinasiForm").action = "/update_destinasi/" + data.id;

    document.getElementById("nama").value = data.nama;
    document.getElementById("lokasi").value = data.lokasi;
    document.getElementById("jenis").value = data.jenis;
    document.getElementById("jam_operasional").value = data.jam_operasional;
    document.getElementById("kategori").value = data.kategori;
    document.getElementById("harga").value = data.harga;
    document.getElementById("koordinat").value = data.koordinat;
    document.getElementById("deskripsi").value = data.deskripsi;
    document.getElementById("deskripsi_singkat").value = data.deskripsi_singkat;

        // reset semua checkbox
    document.querySelectorAll('input[name="fasilitas[]"]').forEach(item => {
        item.checked = false;
    });

    // ubah string jadi array
    let fasilitasArray = [];

    if (data.fasilitas) {
        fasilitasArray = data.fasilitas.split(", ");
    }

    // centang sesuai data database
    document.querySelectorAll('input[name="fasilitas[]"]').forEach(item => {

        if (fasilitasArray.includes(item.value)) {
            item.checked = true;
        }

    });

    // tampilkan gambar lama
    if (data.foto) {
        let img = document.getElementById("previewGambar");
        img.src = "/storage/" + data.foto;
        img.style.display = "block";
    }

    document.getElementById("submitBtn").innerText = "Update";
}

// preview gambar saat dipilih
document.getElementById("foto").addEventListener("change", function(e) {
    let file = e.target.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let img = document.getElementById("previewGambar");
            img.src = e.target.result;
            img.style.display = "block";
        }
        reader.readAsDataURL(file);
    }
});

function hapusDestinasi(id) {
    console.log(id); // test dulu

    fetch(`/destinasi_delete/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {
        alert("Berhasil dihapus");
        location.reload();
    })
    .catch(err => {
        console.error(err);
    });
}