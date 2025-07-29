import './bootstrap';

// === IMPORTS ===
import Swiper from 'swiper';
import 'swiper/css';
import Chart from 'chart.js/auto';
import '@fortawesome/fontawesome-free/css/all.min.css';

window.Chart = Chart;

// === DOM READY ===
document.addEventListener('DOMContentLoaded', () => {
    // === SWIPER ===
    const swiperEl = document.querySelector('.swiper');
    if (swiperEl) {
        new Swiper(swiperEl, {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 500,
                disableOnInteraction: true,
            },
        });
    }

    // === CHART ===
    const chartEl = document.getElementById('myChart');
    if (chartEl) {
        new Chart(chartEl, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar'],
                datasets: [{
                    label: 'Pengunjung',
                    data: [10, 20, 15],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // === AKSESIBILITAS ===
    const html = document.documentElement;
    let fontSize = 100;

    const accBtn = document.getElementById('accessibility-btn');
    const accMenu = document.getElementById('accessibility-menu');

    if (accBtn && accMenu) {
        accBtn.addEventListener('click', () => accMenu.classList.toggle('hidden'));

        document.getElementById('increase-font')?.addEventListener('click', () => {
            fontSize += 10;
            html.style.fontSize = fontSize + '%';
        });

        document.getElementById('decrease-font')?.addEventListener('click', () => {
            fontSize = Math.max(50, fontSize - 10);
            html.style.fontSize = fontSize + '%';
        });

        document.getElementById('toggle-contrast')?.addEventListener('click', () => {
            html.classList.toggle('high-contrast');
        });

        document.getElementById('toggle-grayscale')?.addEventListener('click', () => {
            html.classList.toggle('grayscale');
        });

        document.getElementById('reset-accessibility')?.addEventListener('click', () => {
            fontSize = 100;
            html.style.fontSize = '';
            html.classList.remove('high-contrast', 'grayscale');
        });

        document.addEventListener('click', function (e) {
            if (!accBtn.contains(e.target) && !accMenu.contains(e.target)) {
                accMenu.classList.add('hidden');
            }
        });
    }

    // === SPEECH ON HOVER ===
    const hoverSynth = window.speechSynthesis;

    function speak(text) {
        if (hoverSynth.speaking) hoverSynth.cancel();
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'id-ID';
        utterance.rate = 1;
        hoverSynth.speak(utterance);
    }

    document.querySelectorAll('[data-speak]').forEach(el => {
        el.addEventListener('mouseenter', () => speak(el.dataset.speak));
        el.addEventListener('focus', () => speak(el.dataset.speak));
    });

    // === TOGGLE MENU ===
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('main-nav');

    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }

    // === AUDIO PLAYER ===
    const audio = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const statusText = document.getElementById('statusText');
    const canvas = document.getElementById('waveform');
    const iconPlay = document.getElementById('iconPlay');
    const iconPause = document.getElementById('iconPause');

    if (audio && playPauseBtn && canvas && iconPlay && iconPause) {
        const ctx = canvas.getContext('2d');
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        const analyser = audioCtx.createAnalyser();
        const source = audioCtx.createMediaElementSource(audio);

        source.connect(analyser);
        analyser.connect(audioCtx.destination);

        analyser.fftSize = 128;
        const bufferLength = analyser.frequencyBinCount;
        const dataArray = new Uint8Array(bufferLength);

        function draw() {
            requestAnimationFrame(draw);
            analyser.getByteFrequencyData(dataArray);

            ctx.clearRect(0, 0, canvas.width, canvas.height);
            const barWidth = (canvas.width / bufferLength) * 1.5;
            let x = 0;

            for (let i = 0; i < bufferLength; i++) {
                const barHeight = dataArray[i] / 2;
                ctx.fillStyle = '#f8f7f7ff';
                ctx.fillRect(x, canvas.height - barHeight, barWidth, barHeight);
                x += barWidth + 1;
            }
        }

        draw();

        playPauseBtn.addEventListener('click', () => {
            if (audio.paused) {
                audioCtx.resume();
                audio.play();
                iconPlay.classList.add('hidden');
                iconPause.classList.remove('hidden');
                statusText.textContent = 'Live Now';
            } else {
                audio.pause();
                iconPlay.classList.remove('hidden');
                iconPause.classList.add('hidden');
                statusText.textContent = 'Paused';
            }
        });

        window.addEventListener('resize', () => {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        });
        window.dispatchEvent(new Event('resize'));
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const box = document.getElementById('sambat-box');
    const toggle = document.getElementById('sambat-toggle');

    toggle.addEventListener('click', () => {
        box.classList.toggle('hidden');
        toggle.innerHTML = box.classList.contains('hidden') ? 'Sambat Bunda' : 'Tutup';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggle-iklan');
    const iklanBox = document.getElementById('iklan-box');

    toggleBtn.addEventListener('click', function () {
        if (iklanBox.style.display === 'none') {
            iklanBox.style.display = 'block';
            toggleBtn.innerText = 'Sembunyikan Infromasi';
        } else {
            iklanBox.style.display = 'none';
            toggleBtn.innerText = 'Tampilkan Informasi';
        }
    });
});