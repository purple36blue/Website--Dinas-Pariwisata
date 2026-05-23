const nipInput = document.getElementById("nip");
const nipInfo = document.getElementById("nipInfo");

nipInput.addEventListener("input", function () {

    // hanya angka
    this.value = this.value.replace(/[^0-9]/g, '');

    // maksimal 18 digit
    if (this.value.length > 18) {
        this.value = this.value.slice(0, 18);
    }

    let jumlahDigit = this.value.length;

    // jika belum 18 digit
    if (jumlahDigit < 18) {

        nipInfo.innerText = `NIP harus terdiri dari 18 digit angka (${jumlahDigit}/18)`;

        nipInfo.classList.remove("text-success");
        nipInfo.classList.add("text-muted");

    }

    // jika sudah 18 digit
    else {

        nipInfo.innerText = "NIP anda sudah lengkap";

        nipInfo.classList.remove("text-muted");
        nipInfo.classList.add("text-success");
    }

});

function openAddModal() {
    document.getElementById("modalTitle").innerText = "Tambah Pegawai";
    document.getElementById("pegawaiForm").action = "/store_pegawai";

    document.getElementById("nama").value = "";
    document.getElementById("nip").value = "";
    document.getElementById("jabatan").value = "";

    document.getElementById("previewGambar").style.display = "none";
    document.getElementById("submitBtn").innerText = "Simpan";
}

function openEditModal(data) {
    document.getElementById("modalTitle").innerText = "Edit Pegawai";
    document.getElementById("pegawaiForm").action = "/update_pegawai/" + data.id;

    document.getElementById("nama").value = data.nama;
    document.getElementById("nip").value = data.nip;
    document.getElementById("jabatan").value = data.jabatan;

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

function hapusPegawai(id) {
    console.log(id); // test dulu

    fetch(`/pegawai_delete/${id}`, {
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