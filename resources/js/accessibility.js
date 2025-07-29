document.addEventListener('DOMContentLoaded', function () {
    const html = document.documentElement;
    let fontSize = 100;

    // Toggle dropdown
    const accBtn = document.getElementById('accessibility-btn');
    const accMenu = document.getElementById('accessibility-menu');
    accBtn.addEventListener('click', () => {
        accMenu.classList.toggle('hidden');
    });

    // Fitur aksesibilitas
    document.getElementById('increase-font').addEventListener('click', () => {
        fontSize += 10;
        html.style.fontSize = fontSize + '%';
    });

    document.getElementById('decrease-font').addEventListener('click', () => {
        fontSize = Math.max(50, fontSize - 10);
        html.style.fontSize = fontSize + '%';
    });

    document.getElementById('toggle-contrast').addEventListener('click', () => {
        html.classList.toggle('high-contrast');
    });

    document.getElementById('toggle-grayscale').addEventListener('click', () => {
        html.classList.toggle('grayscale');
    });

    document.getElementById('reset-accessibility').addEventListener('click', () => {
        fontSize = 100;
        html.style.fontSize = '';
        html.classList.remove('high-contrast', 'grayscale');
    });

    // Tutup dropdown saat klik di luar
    document.addEventListener('click', function (e) {
        if (!accBtn.contains(e.target) && !accMenu.contains(e.target)) {
            accMenu.classList.add('hidden');
        }
    });
});
