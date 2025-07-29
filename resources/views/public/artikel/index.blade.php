@extends('layouts.public')
@section('title', 'Artikel')
@section('title', isset($kategori) ? 'Artikel - ' . $kategori : 'Artikel')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-red-700 mb-6">Daftar Artikel</h1>

    @if (isset($kategori))
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Kategori: {{ $kategori }}</h2>
    @endif

    @if ($artikels->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($artikels as $artikel)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" alt="{{ $artikel->judul }}" class="w-full h-56 object-cover">
                    <div class="p-4">
                        <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">{{ $artikel->kategori }}</span> |
                        <span class="text-sm text-gray-500"><i class="fas fa-eye mr-2"></i> {{ $artikel->view_count }}</span>
                        <h3 class="text-lg font-bold mt-2">{{ $artikel->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit(strip_tags($artikel->isi), 100) }}</p>
                        <a href="{{ route('public.artikel.show', $artikel->slug) }}" class="inline-block mt-3 text-red-700 font-semibold hover:underline">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $artikels->links() }}
        </div>
    @else
        <p class="text-gray-500">Belum ada artikel untuk kategori ini.</p>
    @endif
</div>
@endsection
