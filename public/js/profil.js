    const tabs = document.querySelectorAll(".profile-tab");
    const contents = document.querySelectorAll(".tab-pane");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {

            // Hapus active dari semua tombol
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            // Sembunyikan semua konten
            contents.forEach(c => c.classList.remove("active"));

            // Tampilkan konten sesuai target
            const target = this.getAttribute("data-target");
            document.getElementById(target).classList.add("active");
        });
    });

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