const translations = {

    id: {
        nav_home: "BERANDA",
        nav_profile: "PROFIL",
        nav_dest: "DESTINASI",
        nav_event: "ACARA",
        nav_info: "INFORMASI",
        brand: "DINAS PARIWISATA KABUPATEN POSO",
        brand_small: "Sulawesi Tengah",
        kol_kom: "💬Kotak Komentar",
        input_nama: "Masukan nama anda...",
        input_pesan: "Tulis pesan...",
        btn_cmt: "Kirim",
        home_carousel1: "Danau Poso",
        home_carousel2: "Gua Latea",
        home_carousel3: "Air Terjun Wera Saluopa",
        text_carousel1: "Keindahan danau tektonik terbesar ketiga di Indonesia",
        text_carousel2: "Situs peninggalan sejarah dan keindahan alam tiada tara",
        text_carousel3: "Kesegaran dan kejernihan 12 tingkat jantung hutan tropis",
        btncarousel1: "Mulai Menjelajah",
        btncarousel2: "Tentang Kami",
        text_home1: "Temukan Tujuan Wisatamu di Kabupaten Poso",
        filter1: "Kategori",
        filter2: "Jenis",
        filter3: "Wilayah",
        filter_search: "Cari 🔍",
        home_title1: "Selamat Datang di Dinas Pariwisata Kabupaten Poso",
        home_title2: "Jelajahi Keindahan Pariwisata di Kabupaten Poso",
        home_description1: "Dinas Pariwisata berkomitmen untuk memajukan sektor pariwisata, melestarikan budaya, dan meningkatkan kualitas destinasi wisata yang ada di Kabupaten Poso.",
        home_description2: "Temukan berbagai pilihan destinasi dan pengalaman wisata yang menakjubkan",
        card_stat: "Statistik Pariwisata",
        stat_des: "Destinasi",
        stat_kul: "Kuliner",
        stat_bud: "Budaya",
        stat_ac: "Acara",
        stat_peg: "Pegawai"

    },

    en: {
        nav_home: "HOME",
        nav_profile: "PROFILE",
        nav_dest: "DESTINATION",
        nav_event: "EVENTS",
        nav_info: "INFORMATION",
        brand: "TOURISM OFFICE OF POSO REGENCY",
        brand_small: "Central Sulawesi",
        kol_kom: "💬 Comment Box",
        input_nama: "Enter your name...",
        input_pesan: "Write a message...",
        btn_cmt: "Send",
        home_carousel1: "Poso Lake",
        home_carousel2: "Latea Cave",
        home_carousel3: "Wera Saluopa Waterfall",
        text_carousel1: "The beauty of the third largest tectonic lake in Indonesia",
        text_carousel2: "Historical heritage sites and unrivaled natural beauty",
        text_carousel3: "The freshness and clarity of the 12 levels of the heart of the tropical forest",
        btncarousel1: "Start Exploring",
        btncarousel2: "About Us",
        text_home1: "Find Your Tourist Destination in Poso Regency",
        filter1: "Category",
        filter2: "Type",
        filter3: "Region",
        filter_search: "Search 🔍",
        home_title1: "Welcome to the Poso Regency Tourism Office",
        home_title2: "Explore the Beauty of Tourism in Poso Regency",
        home_description1: "The Tourism Office is committed to advancing the tourism sector,preserving culture, and improving the quality of tourist destinations in Poso Regency.",
        home_description2: "Discover a wide selection of amazing destinations and travel experiences",
        card_stat: "Tourism Statistics",
        stat_des: "Destination",
        stat_kul: "Culinary",
        stat_bud: "Culture",
        stat_ac: "Events",
        stat_peg: "Employees"
    }

};

// SET LANGUAGE
let currentLang =
    localStorage.getItem("lang") || "id";

document.addEventListener("DOMContentLoaded", () => {

    applyLanguage(currentLang);

});

// TOGGLE LANGUAGE
function toggleLanguage(event) {

    event.preventDefault();

    currentLang =
        currentLang === "id"
        ? "en"
        : "id";

    localStorage.setItem(
        "lang",
        currentLang
    );

    applyLanguage(currentLang);
}

// APPLY LANGUAGE
function applyLanguage(lang) {

    const elements =
        document.querySelectorAll("[data-id]");

    elements.forEach(el => {

        const key =
            el.getAttribute("data-id");

        if (!translations[lang][key]) return;

        // 🔥 FIX UTAMA DI SINI
        if (el.tagName === "INPUT" || el.tagName === "TEXTAREA") {
            el.placeholder = translations[lang][key];
        } else {
            el.textContent = translations[lang][key];
        }

    });

    // FLAG
    const flag =
        document.getElementById("flagIcon");

    // LABEL
    const label =
        document.getElementById("langLabel");

    if (lang === "id") {

        flag.src =
            "https://flagcdn.com/w20/id.png";

        label.textContent =
            "ID-EN";

    } else {

        flag.src =
            "https://flagcdn.com/w20/gb.png";

        label.textContent =
            "EN-ID";
    }
}