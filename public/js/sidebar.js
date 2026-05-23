
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');
    const arrow = document.getElementById('toggleBtn');

    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');

    // putar panah
    arrow.classList.toggle('rotate');
}

document.querySelectorAll('.menu li a').forEach(item => {
    item.addEventListener('click', function () {

        // hapus semua active
        document.querySelectorAll('.menu li a').forEach(i => i.classList.remove('active'));

        // tambahkan active ke yang diklik
        this.classList.add('active');
    });
});

const currentUrl = window.location.href;

document.querySelectorAll('.menu li a').forEach(link => {
    if (link.href === currentUrl) {
        link.classList.add('active');
    }
});
