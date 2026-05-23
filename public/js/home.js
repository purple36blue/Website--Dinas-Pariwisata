document.addEventListener("DOMContentLoaded", function () {
    let myCarousel = document.querySelector('#heroCarousel');
    new bootstrap.Carousel(myCarousel, {
        interval: 3000,
        ride: 'carousel'
    });
});

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const current = +counter.innerText;

        const increment = target / 100;

        if (current < target) {
            counter.innerText = Math.ceil(current + increment);
            setTimeout(updateCounter, 20);
        } else {
            counter.innerText = target;
        }
    };

    updateCounter();
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

document.addEventListener('hidden.bs.modal', function () {
    document.body.classList.remove('modal-open');

    document.querySelectorAll('.modal-backdrop')
        .forEach(el => el.remove());

    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
});

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


const iframe = document.getElementById("youtubeVideo");
const nextBtn = document.querySelector(".next-video");

// 🔥 LIST VIDEO (BISA TAMBAH SEBANYAK MUNGKIN)
const videos = [
    "BOLuZYsvkMs",
    "eAd0AeORq2o",
    "-a-dseRiQg8",
    "MzC6hQKcLtw"
];

let currentIndex = 0;

// 🔥 FUNCTION GANTI VIDEO
function loadVideo(index, autoplay = false) {
    let params = autoplay 
        ? "?autoplay=1&mute=1&playsinline=1"
        : "?mute=1&playsinline=1";

    iframe.src = `https://www.youtube.com/embed/${videos[index]}${params}`;
}

// 🔥 BUTTON NEXT VIDEO
nextBtn.addEventListener("click", () => {
    currentIndex++;

    if (currentIndex >= videos.length) {
        currentIndex = 0; // ulang dari awal
    }

    loadVideo(currentIndex, true);
});

const observer = new IntersectionObserver((entries) => {

    entries.forEach(entry => {

        if(entry.isIntersecting){
            loadVideo(currentIndex, true);
        }else{
            loadVideo(currentIndex, false);
        }

    });

}, {
    threshold: 0.6
});

observer.observe(iframe);
