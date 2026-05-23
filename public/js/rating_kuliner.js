document.addEventListener("DOMContentLoaded", function () {

    // ==================================================
    // ⭐ KHUSUS MODAL RATING KULINER
    // ==================================================
    document.querySelectorAll(".rating-modal[data-type='kuliner']")
        .forEach(modal => {

        let stars = modal.querySelectorAll(".star");

        stars.forEach(star => {

            // =========================
            // HOVER BINTANG
            // =========================
            star.addEventListener("mouseover", function () {

                let val = this.dataset.value;
                highlightKulinerStars(stars, val);

            });

            // =========================
            // MOUSE OUT
            // =========================
            star.addEventListener("mouseout", function () {

                let selectedRating = modal.dataset.rating || 0;
                highlightKulinerStars(stars, selectedRating);

            });

            // =========================
            // CLICK BINTANG
            // =========================
            star.addEventListener("click", function () {

                let selectedRating = this.dataset.value;

                // simpan rating ke modal
                modal.dataset.rating = selectedRating;

                highlightKulinerStars(stars, selectedRating);

            });

        });

    });


    // ==================================================
    // 🚀 SUBMIT KHUSUS RATING KULINER
    // ==================================================
    document.addEventListener("click", function (e) {

        // hanya button dalam modal kuliner
        if (e.target.classList.contains("btn-submit-rating")) {

            let modal = e.target.closest(
                ".rating-modal[data-type='kuliner']"
            );

            // jika bukan modal kuliner → stop
            if (!modal) return;

            let stars = modal.querySelectorAll(".star");

            // ambil id kuliner
            let kulinerId = modal.dataset.id;

            // ambil rating
            let selectedRating = modal.dataset.rating || 0;

            // ambil komentar
            let komentar = modal.querySelector(".komentar-input").value;

            // =========================
            // VALIDASI
            // =========================
            if (selectedRating == 0) {

                alert("Pilih rating dulu!");
                return;

            }

            // =========================
            // FETCH RATING KULINER
            // =========================
            fetch("/ratingkuliner", {

                method: "POST",

                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                },

                body: JSON.stringify({

                    kuliner_id: kulinerId,
                    rating: selectedRating,
                    komentar: komentar

                })

            })
            .then(res => res.json())
            .then(res => {

                alert("Rating kuliner berhasil disimpan!");

                // reset rating
                modal.dataset.rating = 0;

                // reset komentar
                modal.querySelector(".komentar-input").value = "";

                // reset tampilan bintang
                highlightKulinerStars(stars, 0);

                // tutup modal kuliner
                let modalEl = modal.closest(".modal");

                let bsModal =
                    bootstrap.Modal.getOrCreateInstance(modalEl);

                bsModal.hide();

                // bersihkan backdrop bootstrap
                document.querySelectorAll(".modal-backdrop")
                    .forEach(el => el.remove());

                document.body.classList.remove("modal-open");
                document.body.style = "";

            })
            .catch(err => {

                console.error(err);
                alert("Terjadi kesalahan saat mengirim rating!");

            });

        }

    });


    // ==================================================
    // ⭐ FUNCTION WARNA BINTANG KULINER
    // ==================================================
    function highlightKulinerStars(stars, rating) {

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