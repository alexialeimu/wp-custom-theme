jQuery(document).ready(function ($) {
    AOS.init({
        offset: 170,
        duration: 600,
    });
});

const btn = document.getElementById('menu-btn');
const nav = document.getElementById('menu');

btn.addEventListener('click', () => {
    btn.classList.toggle('open');
    nav.classList.toggle('flex');
    nav.classList.toggle('hidden');
});
