document.querySelectorAll('.counter').forEach(counter => {
    let update = () => {
        let target = +counter.getAttribute('data-target');
        let current = +counter.innerText;

        let increment = Math.ceil(target / 50);

        if (current < target) {
            counter.innerText = current + increment;
            setTimeout(update, 30);
        } else {
            counter.innerText = target;
        }
    };
    update();
});

