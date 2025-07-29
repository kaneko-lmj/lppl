@extends('layouts.public')
@section('title', 'Beranda')

@section('content')

<div class="max-w-7xl mx-auto relative bg-cover bg-center h-[180px] md:h-[220px]" style="background-image: url('{{ asset('img/hero.jpg') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-60 flex items-center justify-center">
        <div class="text-center px-4 w-full">
            <h1 class="text-4xl md:text-5xl text-black font-bold mb-2">Suara Lumajang</h1>
            <p class="text-lg md:text-xl text-red-700 font-bold mb-4">Informasi Cerdas Menginspirasi</p>

            
            <div class="flex flex-col items-center space-y-2">
                
                <div class="flex items-center gap-3">
                    
                    <button id="playPauseBtn" class="bg-red-700 hover:bg-red-600 text-white p-3 rounded-full shadow-md transition duration-200">
                        
                        <svg id="iconPlay" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                        
                        <svg id="iconPause" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white hidden" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                        
                    </button>
                    <div class="bg-red-700">
                        <canvas id="waveform" class="w-72 h-12"></canvas>
                    </div>
                    <span id="statusText" class="text-sm text-red-700 font-bold">Offline</span>
                </div>
                <audio id="audioPlayer" src="https://radio.suaralumajang.com:8443/live" crossorigin="anonymous"></audio>
            </div>
        </div>
    </div>
</div>



<section class="max-w-7xl mx-auto px-4 justify-between items-center py-10 bg-gray-50 px-6">
    <h2 class="text-2xl font-bold mb-6 text-red-700">Artikel Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($artikels as $artikel)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" alt="{{ $artikel->judul }}" class="rounded w-full h-56 object-cover mb-2">
            <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded">{{$artikel->kategori}}</span> |
            <span class="text-sm text-gray-500"><i class="fas fa-eye mr-2"></i> {{ $artikel->view_count }}</span>
            <h3 class="font-bold mt-2">{{ $artikel->judul }}</h3>
            <p class="text-sm text-gray-600 mb-2">{{ mb_strimwidth($artikel->isi, 0, 100, '...', 'UTF-8') }}</p>
            <a href="{{ route('public.artikel.show', $artikel->slug) }}" class="text-white bg-red-600 px-3 py-1 rounded text-sm">Selengkapnya</a>
        </div>
        @endforeach
    </div>
</section>


<section class="max-w-7xl mx-auto px-4 justify-between items-center py-10 bg-white px-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-red-700">Program Unggulan</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 text-center">
        <x-program icon="📰" title="JELITA" desc="Jelajah Informasi dan Berita." />
        <x-program icon="💃🏻" title="GEDANG AGUNG" desc="Gerak Dangdut Anti Bingung." />
        <x-program icon="🎶" title="GALAKSI" desc="Gabungan Lagu Kenangan Masa Silam." />
        <x-program icon="☕" title="JAMBORE" desc="Jam Berita Sore." />
        <x-program icon="💡" title="SPADA" desc="Spesial Anak Muda." />
        <x-program icon="🎻" title="SETALAM" desc="Senandung Gita Malam." />
    </div>
</section>
@endsection
