const form = document.getElementById("chatForm");
const chatBox = document.getElementById("chatBox");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    let nama = document.getElementById("nama").value;
    let pesan = document.getElementById("pesan").value;
    let role = document.getElementById("role").value;

    fetch("/comments", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            nama: nama,
            pesan: pesan,
            role: role
        })
    })
    .then(async res => {
        let data = await res.json();

        // ❌ kalau error dari controller
        if (!res.ok) {
            Swal.fire({
            icon: "error",
            title: "Gagal",
            text: data.message
        }); // 🔥 tampilkan pesan
            throw new Error(data.message);
        }

        return data;
    })
    .then(res => {
        renderChat(res.data); // 🔥 ambil data
        form.reset();
    })
    .catch(err => console.log("ERROR:", err));
});

// 🔥 WAJIB ADA
function renderChat(data) {
    let posisi = data.role === "admin" ? "chat-admin" : "chat-user";

    let html = `
        <div class="chat-item ${posisi}">
            <div class="chat-name">${data.nama}</div>
            <div class="chat-bubble">${data.pesan}</div>
        </div>
    `;

    chatBox.innerHTML += html;

    // 🔥 auto scroll ke bawah
    chatBox.scrollTop = chatBox.scrollHeight;
}
// load chat
function loadChat() {
    fetch("/getcomments")
    .then(async res => {
        let data = await res.json();

        console.log("STATUS:", res.status);
        console.log("DATA:", data);

        if (!res.ok) {
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: data.message
            });
            throw new Error(data.message);
        }

        return data;
    })
    .then(data => {
        chatBox.innerHTML = "";
        data.forEach(renderChat); // jangan di-reverse!
    });
}

// saat modal dibuka
document.getElementById('commentModal')
.addEventListener('shown.bs.modal', loadChat);