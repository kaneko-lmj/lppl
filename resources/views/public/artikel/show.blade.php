@extends('layouts.public')

@section('title', $artikel->judul)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">

    {{-- Konten utama --}}
    <div class="lg:w-2/3">
        <h1 class="text-3xl font-bold text-red-700 mb-2" data-speak="{{ $artikel->judul }}">{{ $artikel->judul }}</h1>
        <div class="text-sm text-gray-500 mb-4">
            <span><time>{{ $artikel->created_at->format('d F Y') }}</time></span> |
            <span>Kategori: {{ $artikel->kategori }}</span> |
            <span>Penulis: {{ $artikel->penulis ?? 'Admin' }}</span> |
            <span class="text-sm text-gray-500"><i class="fas fa-eye mr-2"></i> {{ $artikel->view_count }}</span>
        </div>

        @if ($artikel->dokumentasi)
            <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" alt="{{ $artikel->judul }}" class="w-full h-auto rounded mb-6">
        @endif
        <div class="text-sm text-gray-500 mb-4 text-center">
            <span>Foto : Dok.  {{ $artikel->fotografer }}</span>
        </div>
        
        <div class="prose max-w-none text-justify" data-speak="{!! $artikel->isi !!}">
            <article>{!! nl2br(e($artikel->isi)) !!}</article>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="lg:w-1/3 space-y-8">
        {{-- Rekomendasi --}}
        <div class="bg-white rounded shadow p-4">
            <h2 class="font-bold text-lg text-red-700 mb-2">Rekomendasi Untuk Anda</h2>
            <ul class="space-y-2">
                @foreach ($rekomendasi as $item)
                    <li>
                        <a href="{{ route('public.artikel.show', $item->slug) }}" class="text-sm text-gray-700 hover:underline">
                            {{ Str::limit($item->judul, 60) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

{{-- Berita Terbaru --}}
<div class="max-w-7xl mx-auto px-4 mt-12">
    <h2 class="text-xl font-bold mb-4 text-red-700">Berita Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($beritaTerbaru as $item)
            <div class="bg-white rounded shadow overflow-hidden">
                <img src="{{ asset('storage/' . $item->dokumentasi) }}" alt="{{ $item->judul }}" class="w-full h-56 object-cover">
                <div class="p-4">
                    <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">{{ $item->kategori }}</span>
                    <h3 class="text-base font-semibold mt-2">{{ $item->judul }}</h3>
                    <a href="{{ route('public.artikel.show', $item->slug) }}" class="text-sm text-red-600 hover:underline">Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
