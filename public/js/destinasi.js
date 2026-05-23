// =========================
// SCROLL REVEAL
// =========================
window.addEventListener("scroll", function () {
    const reveals = document.querySelectorAll(".reveal");

    reveals.forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;

        if (elementTop < windowHeight - 100) {
            el.classList.add("active");
        }
    });
});


// =========================
// TAB SYSTEM
// =========================
document.addEventListener("DOMContentLoaded", function () {

    const isReload = performance.getEntriesByType("navigation")[0].type === "reload";

    let tab = 'destinasi';

    if (!isReload) {
        const urlParams = new URLSearchParams(window.location.search);
        tab = urlParams.get('tab') || 'destinasi';
    }

    showTab(null, tab);
});

function showTab(evt, tabId) {

    document.querySelectorAll('.tab-content')
        .forEach(content => content.classList.remove('active'));

    document.querySelectorAll('.tab')
        .forEach(tab => tab.classList.remove('active'));

    document.getElementById(tabId).classList.add('active');

    document.querySelectorAll('.tab').forEach(btn => {
        if (btn.getAttribute('onclick').includes(tabId)) {
            btn.classList.add('active');
        }
    });
}

function loadRating(destinasiId) {

    fetch(`/getratingdestinasi/${destinasiId}`)
        .then(res => res.json())
        .then(data => {

            let el = document.getElementById(`rating-${destinasiId}`);

            if (!el) return;

            el.innerHTML = renderStars(data.avg) + " " + data.avg;

        })
        .catch(err => console.log(err));
}

function renderStars(rating) {

    let full = Math.floor(rating);
    let half = rating % 1 >= 0.5;
    let empty = 5 - full - (half ? 1 : 0);

    let stars = "";

    for (let i = 0; i < full; i++) {
        stars += '<i class="bi bi-star-fill text-warning"></i>';
    }

    if (half) {
        stars += '<i class="bi bi-star-half text-warning"></i>';
    }

    for (let i = 0; i < empty; i++) {
        stars += '<i class="bi bi-star text-warning"></i>';
    }

    return stars;
}

document.addEventListener("DOMContentLoaded", () => {

    let cards = document.querySelectorAll("[id^='rating-']");

    cards.forEach(el => {

        let id = el.id.split("-")[1];

        loadRating(id);

    });

});


// =========================
// LOAD KOMENTAR
// =========================
function loadKomentar(destinasiId) {

    console.log("LOAD ID:", destinasiId);

    fetch("/getratingdestinasi/" + destinasiId)
        .then(res => res.json())
        .then(data => {

            console.log("DATA:", data);

            let avg = data.avg ? parseFloat(data.avg) : 0;

            let container = document.getElementById("comment-list-" + destinasiId);

            if (!container) return;

            container.innerHTML = "";

            // ⭐ rata-rata
            container.innerHTML += `
                <div class="mb-2">
                    <strong>⭐ ${avg.toFixed(1)} / 5</strong> 
                    (${data.count} ulasan)
                </div>
            `;

            // 💬 komentar
            data.komentar.forEach(item => {

                let stars = "";

                for (let i = 1; i <= 5; i++) {
                    stars += i <= item.rating
                        ? `<i class="bi bi-star-fill text-warning"></i>`
                        : `<i class="bi bi-star text-muted"></i>`;
                }

                container.innerHTML += `
                    <div class="border rounded p-2 mb-2 bg-light">
                        <div>${stars}</div>
                        <div class="mt-1">${item.komentar || 'Tidak ada komentar'}</div>
                    </div>
                `;
            });

            // ⭐ MODAL HEADER
            let avgBox = document.getElementById("avg-rating-" + destinasiId);

            if (avgBox) {

                let stars = "";

                for (let i = 1; i <= 5; i++) {
                    stars += i <= Math.round(avg)
                        ? `<i class="bi bi-star-fill text-warning"></i>`
                        : `<i class="bi bi-star text-light"></i>`;
                }

                avgBox.innerHTML = `${stars} ${avg.toFixed(1)}`;
            }

        })
        .catch(err => console.error("ERROR FETCH:", err));
}


// =========================
// FIX EVENT MODAL (PALING PENTING 🔥)
// =========================
document.addEventListener("click", function (e) {

    let btn = e.target.closest("[data-bs-target]");

    if (btn) {

        let target = btn.getAttribute("data-bs-target");
        let modal = document.querySelector(target);

        if (modal && modal.dataset.id) {

            console.log("MODAL DIBUKA:", modal.dataset.id); // DEBUG

            // delay kecil biar modal siap
            setTimeout(() => {
                loadKomentar(modal.dataset.id);
            }, 300);
        }
    }

});