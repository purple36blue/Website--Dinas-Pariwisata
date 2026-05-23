document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const name = document.getElementById("name").value;
        const password = document.getElementById("password").value;

        if(name === "" || password === "") {
            alert("Username dan Password wajib diisi!");
            return;
        }

        // Simulasi login
        alert("Login berhasil!");

        // Redirect contoh
        // window.location.href = "/dashboard";
    });

});