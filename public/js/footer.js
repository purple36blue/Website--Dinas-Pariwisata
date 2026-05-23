const footer = document.getElementById("footer");

/* LIST WARNA GRADIENT */
const gradients = [
    "linear-gradient(135deg, #00b894, #0984e3)",
    "linear-gradient(135deg, #0984e3, #6c5ce7)",
    "linear-gradient(135deg, #00cec9, #0984e3)",
    "linear-gradient(135deg, #6c5ce7, #00b894)"
];

let index = 0;

/* GANTI BACKGROUND SETIAP 4 DETIK */
setInterval(() => {
    index = (index + 1) % gradients.length;
    footer.style.background = gradients[index];
}, 4000);

