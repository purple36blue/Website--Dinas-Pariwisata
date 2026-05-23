
document.addEventListener("DOMContentLoaded", function () {

    // =========================
    // ⭐ HOVER + CLICK BINTANG
    // =========================
    document.querySelectorAll(".rating-modal[data-type='destinasi']").forEach(modal => {

        let stars = modal.querySelectorAll(".star");

        stars.forEach(star => {

            // hover
            star.addEventListener("mouseover", function () {
                let val = this.dataset.value;
                highlightStars(stars, val);
            });

            // keluar hover
            star.addEventListener("mouseout", function () {
                let selectedRating = modal.dataset.rating || 0;
                highlightStars(stars, selectedRating);
            });

            // klik
            star.addEventListener("click", function () {
                let selectedRating = this.dataset.value;

                // simpan ke modal (PENTING)
                modal.dataset.rating = selectedRating;

                highlightStars(stars, selectedRating);
            });

        });

    });


    // =========================
    // 🚀 SUBMIT (FIX DOUBLE)
    // =========================
    document.addEventListener("click", function (e) {

        if (e.target.classList.contains("btn-submit-rating")) {

            let modal = e.target.closest(".rating-modal");
            let stars = modal.querySelectorAll(".star");

            let destinasiId = modal.dataset.id;
            let selectedRating = modal.dataset.rating || 0;
            let komentar = modal.querySelector(".komentar-input").value;

            // validasi
            if (selectedRating == 0) {
                alert("Pilih rating dulu!");
                return;
            }

            fetch("/ratingdestinasi", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    destinasi_id: destinasiId,
                    rating: selectedRating,
                    komentar: komentar
                })
            })
            .then(res => res.json())
            .then(res => {

                alert("Rating berhasil disimpan!");

                // reset data
                modal.dataset.rating = 0;
                modal.querySelector(".komentar-input").value = "";

                highlightStars(stars, 0);

                // tutup modal rating
                let ratingModalEl = modal.closest(".modal");
                let ratingModal = bootstrap.Modal.getOrCreateInstance(ratingModalEl);
                ratingModal.hide();

                // =========================
                // 🚀 BUKA MODAL DESTINASI
                // =========================
                let destinasiId = modal.dataset.id;

                let destinasiModalEl = document.getElementById("modalDestinasi" + destinasiId);

                if (destinasiModalEl) {
                    let destinasiModal = new bootstrap.Modal(destinasiModalEl);
                    destinasiModal.show();
                }

                // bersihkan backdrop
                document.querySelectorAll(".modal-backdrop").forEach(el => el.remove());
                document.body.classList.remove("modal-open");
                document.body.style = "";

            })
            .catch(err => {
                console.error(err);
                alert("Terjadi kesalahan!");
            });

        }

    });


    // =========================
    // ⭐ FUNCTION WARNA BINTANG
    // =========================
    function highlightStars(stars, rating) {
        stars.forEach(star => {

            if (star.dataset.value <= rating) {
                star.classList.remove("bi-star");
                star.classList.add("bi-star-fill", "active");
            } else {
                star.classList.remove("bi-star-fill", "active");
                star.classList.add("bi-star");
            }

        });
    }  

});


