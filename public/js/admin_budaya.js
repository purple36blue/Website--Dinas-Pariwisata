function openAddModal() {
    document.getElementById("modalTitle").innerText = "Tambah Data Budaya";
    document.getElementById("budayaForm").action = "/store_budaya";

    document.getElementById("nama").value = "";
    document.getElementById("jenis").value = "";
    document.getElementById("video").value = "";
    document.getElementById("deskripsi").value = "";

    document.getElementById("previewGambar").style.display = "none";
    document.getElementById("submitBtn").innerText = "Simpan";
}

function openEditModal(data) {
    document.getElementById("modalTitle").innerText = "Edit Data Budaya";
    document.getElementById("budayaForm").action = "/update_budaya/" + data.id;

    document.getElementById("nama").value = data.nama;
    document.getElementById("jenis").value = data.jenis;
    document.getElementById("video").value = data.video;
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

    fetch(`/budaya_delete/${id}`, {
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