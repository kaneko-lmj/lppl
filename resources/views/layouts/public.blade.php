<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Suara Lumajang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-suara.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    
<header class="bg-white/60 shadow sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center py-2 relative">

      
        <div class="flex items-center gap-4">
            <a href="/">
                <img src="{{ asset('images/logo-suara.png') }}" alt="Logo" class="w-20">
            </a>
        </div>

        
        <button id="menu-toggle" class="md:hidden text-red-700 focus:outline-none">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>

        
        <nav id="main-nav" class="hidden flex-col md:flex md:flex-row md:items-center font-bold text-xs absolute md:static bg-white md:bg-transparent top-full left-0 w-full md:w-auto shadow md:shadow-none p-4 md:p-0 z-40 space-y-2 md:space-y-0 md:space-x-4">

            
            <div class="relative group">
                <button id="accessibility-btn" class="bg-gray-200 text-black px-2 py-1 rounded text-sm" data-speak="Aksesbilitas">
                    ♿
                </button>
                <div id="accessibility-menu"
                    class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg p-2 hidden z-50">
                    <button id="increase-font"
                        class="block w-full text-left text-sm py-1 hover:bg-gray-100">Perbesar Teks</button>
                    <button id="decrease-font"
                        class="block w-full text-left text-sm py-1 hover:bg-gray-100">Perkecil Teks</button>
                    <button id="toggle-contrast"
                        class="block w-full text-left text-sm py-1 hover:bg-gray-100">Kontras Tinggi</button>
                    <button id="toggle-grayscale"
                        class="block w-full text-left text-sm py-1 hover:bg-gray-100">Grayscale</button>
                    <button id="reset-accessibility"
                        class="block w-full text-left text-sm py-1 text-red-500 hover:bg-red-100">Reset</button>
                </div>
            </div>

            
            <a href="/" class="hover:text-xl text-red-700" data-speak="Beranda">Home</a>

            
            <div class="relative group">
                <button class="hover:text-xl text-red-700" data-speak="Artikel">Artikel</button>
                <ul class="absolute hidden group-hover:block bg-white text-black shadow-lg py-2 rounded-md w-40 z-20">
                    <li>
                        <a href="{{ route('public.artikel.index') }}" class="block px-4 py-2 hover:bg-gray-100" data-speak="Semua Artikel">
                            Semua Artikel
                        </a>
                        </li>
                    @foreach ([
                        'Pemerintahan', 'Keagamaan', 'Infrastruktur', 'Lingkungan Hidup',
                        'Pertanian', 'Pendidikan', 'Olahraga & Kesehatan', 'Kebencanaan',
                        'Ekonomi & Sosial', 'Politik & Hukum', 'Wisata & Kuliner',
                        'Komoditas & Perdagangan', 'Seni & Budaya'
                        ] as $kategori)
                        <li>
                            <a href="{{ route('public.artikel.kategori', $kategori) }}"
                                class="block px-4 py-2 hover:bg-gray-100" data-speak="{{ $kategori }}">
                                {{ $kategori }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            
            <a href="{{ route('public.talkshow') }}" class="block w-full hover:text-xl text-red-700" data-speak="Talkshow">Talkshow</a>
            <a href="{{ route('public.jadwal') }}" class="block w-full hover:text-xl text-red-700"
                data-speak="Jadwal Program Siaran">Program</a>
            <a href="{{ route('public.galeri') }}" class="block w-full hover:text-xl text-red-700"
                data-speak="Galeri Kegiatan">Galeri</a>
            <a href="{{ route('public.team') }}" class="block w-full hover:text-xl text-red-700"
                data-speak="Tim Suara Lumajang FM">Team</a>
            <a href="{{ route('public.about') }}" class="block w-full hover:text-xl text-red-700"
                data-speak="Tentang Kami">Tentang Kami</a>

            
            <a href="/login"
                class="text-xs font-semibold bg-red-700 text-white px-3 py-1 rounded hover:bg-red-800 transition block w-full ">
                Login
            </a>
        </nav>
    </div>
</header>

<div id="sambat-widget">
  <div id="sambat-box" class="hidden">
    <img src="{{ asset('images/sambat-bunda.png') }}" data-speak="sambat bunda" alt="Sambat Bunda" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
    <strong data-speak="sambat bunda">Sambat Bunda</strong>
    <p style="margin: 8px 0;" data-speak="Ada keluhan atau ingin curhat? Klik di sini" >Ada keluhan atau ingin curhat? Klik di sini!</p>
    <a href="https://wa.me/6281234567890" target="_blank" class="sambat-link" data-speak="sambat bunda via whatsapp">💬 Sambat via WhatsApp</a>
  </div>
  <button id="sambat-toggle">
    <img src="{{ asset('images/sambat-bunda.png') }}" alt="Sambat Bunda" style="width: 30px; border-radius: 50%;" data-speak="sambat bunda">
  </button>
</div>

<div id="iklan-wrapper" class="fixed bottom-5 left-5 z-50">
    <button
        id="toggle-iklan"
        class="mb-2 bg-red-600 text-white font-bold text-xs px-3 py-1 rounded-full shadow-md hover:bg-red-700 transition">
        Sembunyikan Informasi
    </button>

    <div id="iklan-box">
        <a href="#" class="block w-48 shadow-xl border border-gray-300 rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300">
            <img src="{{ asset('informasi/informasi.jpg') }}" alt="Iklan Layanan Masyarakat" class="w-full h-auto" data-speak="Pojok Informasi">
        </a>
    </div>
</div>
    
    <main class="pt-6">
        @yield('content')
    </main>


<footer class="bg-red-700 text-white mt-10 py-6 text-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-start flex-wrap gap-6">
            
            <div class="w-full md:w-auto">
                <img src="{{ asset('images/logo-suara.png') }}" alt="Logo Suara Lumajang" class="w-32 mb-2">
                <p>Jl. WR. Soepratman 27, Lumajang</p>
            </div>

            
            <div class="w-full md:w-auto">
                <h4 class="font-bold mb-2">Jam Operasional</h4>
                <p>Senin–Sabtu: 06:00–23:00</p>
                <p>Minggu: 07:00–23:00</p>
                
                <div class="mt-4">
                    <h4 class="font-bold mb-2">
                    Jumlah Pengunjung: {{ number_format($visits) }}
                    </h4>
                </div>
            </div>
            

            
            <div class="w-full md:w-auto">
                <h4 class="font-bold mb-2">Kontak</h4>
                <p class="flex items-center gap-2">
                    <i class="fas fa-phone-alt text-white"></i>
                    <span>0334 444404</span>
                </p>
                <p class="flex items-center gap-2">
                    <i class="fas fa-envelope text-white"></i>
                    <span>suaralumajangradio@gmail.com</span>
                </p>
                <div class="mt-2 space-y-1">
                    <a href="https://facebook.com/suaralumajangfm" target="_blank" class="flex items-center gap-2 hover:text-blue-300">
                        <i class="fab fa-facebook fa-lg"></i> Facebook
                    </a>
                    <a href="https://instagram.com/suaralumajang" target="_blank" class="flex items-center gap-2 hover:text-pink-300">
                        <i class="fab fa-instagram fa-lg"></i> Instagram
                    </a>
                    <a href="https://www.youtube.com/@radiosuaralumajang4874" target="_blank" class="flex items-center gap-2 hover:text-red-300">
                        <i class="fab fa-youtube fa-lg"></i> YouTube
                    </a>
                </div>
            </div>
        </div>

        
        <div class="text-center text-white mt-6">
            <p>© 2025 Diskominfo Lumajang. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>
