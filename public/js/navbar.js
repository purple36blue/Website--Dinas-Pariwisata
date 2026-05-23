window.addEventListener("scroll", function () {

    const navbar = document.getElementById("navbar");
    const carousel = document.getElementById("heroCarousel");

    // CEK DULU APAKAH HERO ADA
    if (!carousel) return;

    const carouselHeight = carousel.offsetHeight;

    if (window.scrollY > carouselHeight - 50) {
        navbar.classList.add("navbar-scrolled");
    } else {
        navbar.classList.remove("navbar-scrolled");
    }

});

/* ========================= */
/* TOGGLE SEARCH */
/* ========================= */

function toggleSearch() {

    const box =
        document.getElementById("searchBox");

    box.classList.toggle("active");

    if (box.classList.contains("active")) {

        document
            .getElementById("searchInput")
            .focus();

        loadHistory();
    }
}

/* ========================= */
/* ELEMENT */
/* ========================= */

const input =
    document.getElementById("searchInput");

const resultBox =
    document.getElementById("searchResult");

/* ========================= */
/* SEARCH */
/* ========================= */

input.addEventListener("keyup", async function () {

    const keyword =
        this.value.trim();

    resultBox.innerHTML = "";

    if (keyword.length < 1) {

        loadHistory();

        return;
    }

    try {

        const response =
            await fetch(`/search-all?keyword=${keyword}`);

        const data =
            await response.json();

        resultBox.style.display = "block";

        if (data.length === 0) {

            resultBox.innerHTML = `

                <div class="search-empty">
                    Data tidak ditemukan
                </div>

            `;

            return;
        }

        data.forEach(item => {

            resultBox.innerHTML += `

                <a href="${item.url}"
                    class="search-item"
                    onclick="saveHistory('${item.title}')">

                    <div class="search-category">
                        ${item.category}
                    </div>

                    <h6>
                        ${item.title}
                    </h6>

                </a>

            `;
        });

    } catch(error) {

        console.log(error);
    }

});

/* ========================= */
/* SEARCH HISTORY */
/* ========================= */

function saveHistory(keyword) {

    let history =
        JSON.parse(localStorage.getItem("searchHistory")) || [];

    /* HAPUS DUPLIKAT */
    history =
        history.filter(item => item !== keyword);

    /* TAMBAH PALING ATAS */
    history.unshift(keyword);

    /* LIMIT */
    history = history.slice(0, 5);

    localStorage.setItem(
        "searchHistory",
        JSON.stringify(history)
    );
}

/* ========================= */
/* LOAD HISTORY */
/* ========================= */

function loadHistory() {

    let history =
        JSON.parse(localStorage.getItem("searchHistory")) || [];

    resultBox.innerHTML = "";

    resultBox.style.display = "block";

    if (history.length === 0) {

        resultBox.innerHTML = `

            <div class="search-empty">
                Belum ada histori pencarian
            </div>

        `;

        return;
    }

    resultBox.innerHTML += `

        <div class="history-title">
            Pencarian Terakhir
        </div>

    `;

    history.forEach(item => {

        resultBox.innerHTML += `

            <div class="history-item"
                onclick="searchFromHistory('${item}')">

                <i class="bi bi-clock-history"></i>

                ${item}

            </div>

        `;
    });
}

/* ========================= */
/* SEARCH DARI HISTORY */
/* ========================= */

function searchFromHistory(keyword) {

    input.value = keyword;

    input.dispatchEvent(
        new Event("keyup")
    );
}

/* ========================= */
/* CLOSE */
/* ========================= */

document.addEventListener("click", function(e){

    const wrapper =
        document.querySelector(".search-wrapper");

    if (!wrapper.contains(e.target)) {

        resultBox.style.display = "none";
    }

});

/* ========================= */
/* RESET SEARCH SAAT REFRESH */
/* ========================= */

window.addEventListener("load", function () {

    /* HAPUS PARAMETER SEARCH */
    const url =
        new URL(window.location);

    if (url.searchParams.has("search")) {

        url.searchParams.delete("search");

        window.history.replaceState(
            {},
            document.title,
            url.pathname
        );
    }

});
