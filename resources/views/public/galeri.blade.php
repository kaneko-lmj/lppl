@extends('layouts.public')
@section('title', 'Galeri')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-8">Galeri Kegiatan</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($galeris as $galeri)
            <div class="bg-white shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full object-cover">
                <div class="p-4">
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}</p>
                    <h3 class="text-lg font-semibold mt-1">{{ $galeri->judul }}</h3>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination jika ada --}}
    <div class="mt-8">
        {{ $galeris->links() }}
    </div>
</div>
@endsection
