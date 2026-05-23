document.addEventListener("DOMContentLoaded", function() {

    const form = document.getElementById("chatForm");
    const chatBox = document.getElementById("chatBox");

    // 🔥 load chat saat halaman dibuka
    loadChat();

    // 🔥 auto refresh
    setInterval(loadChat, 2000);

    // kirim pesan
    form.addEventListener("submit", function(e) {
        e.preventDefault();

        let data = {
            nama: document.getElementById("nama").value,
            pesan: document.getElementById("pesan").value,
            role: document.getElementById("role").value,
            email: document.getElementById("email").value
        };

        fetch("/comments_admin", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            renderChat(res);
            form.reset();
        });
    });

    // tampilkan chat
    function renderChat(data) {
        let posisi = data.role === "admin" ? "chat-admin" : "chat-user";

        let html = `
            <div class="chat-item ${posisi}">
                <div>
                    <div class="chat-name">${data.nama}</div>
                    <div class="chat-bubble">${data.pesan}</div>
                </div>
            </div>
        `;

        chatBox.innerHTML += html;

        // auto scroll bawah
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // 🔥 load semua chat
    function loadChat() {
        fetch("/getcomments_admin") // ✅ endpoint diperbaiki
        .then(res => res.json())
        .then(data => {
            chatBox.innerHTML = "";
            data.forEach(item => renderChat(item));
        });
    }

});

function hapusByRange() {
    let range = document.getElementById("filterRange").value;

    if (!range) {
        alert("Pilih rentang waktu dulu!");
        return;
    }

    let pesan = "";

    if (range === "all") {
        pesan = "Yakin ingin menghapus SEMUA komentar?";
    } else {
        pesan = `Yakin ingin menghapus komentar lebih dari ${range} bulan?`;
    }

    if (!confirm(pesan)) return;

    fetch("/delete_comments_by_range", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ range: range })
    })
    .then(res => res.json())
    .then(res => {
        alert(res.message);
        loadChat(); // reload chat
    })
    .catch(err => console.log(err));
}