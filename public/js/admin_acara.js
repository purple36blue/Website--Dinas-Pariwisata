function openAddModal() {
    document.getElementById("modalTitle").innerText = "Tambah Acara";
    document.getElementById("acaraForm").action = "/store_acara";

    document.getElementById("nama").value = "";
    document.getElementById("lokasi").value = "";
    document.getElementById("mulai").value = "";
    document.getElementById("akhir").value = "";
    document.getElementById("koordinat").value = "";
    document.getElementById("deskripsi").value = "";

    document.getElementById("previewGambar").style.display = "none";
    document.getElementById("submitBtn").innerText = "Simpan";
}

function openEditModal(data) {
    document.getElementById("modalTitle").innerText = "Edit Acara";
    document.getElementById("acaraForm").action = "/update_acara/" + data.id;

    document.getElementById("nama").value = data.nama;
    document.getElementById("lokasi").value = data.lokasi;
    document.getElementById("mulai").value = data.mulai;
    document.getElementById("akhir").value = data.akhir;
    document.getElementById("koordinat").value = data.koordinat;
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

function hapusAcara(id) {
    console.log(id); // test dulu

    fetch(`/acara_delete/${id}`, {
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