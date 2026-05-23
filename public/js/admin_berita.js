function openAddModal() {
    document.getElementById("modalTitle").innerText = "Tambah Data Berita";
    document.getElementById("beritaForm").action = "/store_berita";

    document.getElementById("judul").value = "";
    document.getElementById("deskripsi_singkat").value = "";
    document.getElementById("deskripsi").value = "";

    document.getElementById("previewGambar").style.display = "none";
    document.getElementById("submitBtn").innerText = "Simpan";
}

function openEditModal(data) {
    document.getElementById("modalTitle").innerText = "Edit Data Berita";
    document.getElementById("beritaForm").action = "/update_beriat/" + data.id;

    document.getElementById("judul").value = data.jududl;
    document.getElementById("deskripsi_singkat").value = data.deskripsi_singkat;
    document.getElementById("deskripsi").value = data.deskripsi;

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

function hapusBudaya(id) {
    console.log(id); // test dulu

    fetch(`/berita_delete/${id}`, {
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