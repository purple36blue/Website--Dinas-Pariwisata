const tabContents =
    document.querySelectorAll(".tab-content-box");

const tabButtons =
    document.querySelectorAll(".info-tab-btn");

tabButtons.forEach(button => {

    button.addEventListener("click", () => {

        // HAPUS ACTIVE
        tabButtons.forEach(btn =>
            btn.classList.remove("active")
        );

        tabContents.forEach(content =>
            content.classList.remove("active")
        );

        // TAMBAH ACTIVE
        button.classList.add("active");

        const target =
            document.getElementById(
                button.dataset.tab
            );

        target.classList.add("active");

    });

});
