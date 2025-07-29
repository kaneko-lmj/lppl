@extends('layouts.app')
@section('title', 'Kelola Galeri')
@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold text-red-700">Kelola Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow">
        + Tambah Galeri
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
    @foreach ($galeris as $galeri)
        <div class="bg-white rounded shadow overflow-hidden">
            {{-- Gambar --}}
            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                 class="aspect-square object-cover w-full">

            {{-- Judul & Tanggal --}}
            <div class="p-3">
                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($galeri->tanggal_posting)->translatedFormat('d F Y') }}</p>
                <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $galeri->judul }}</p>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-2 mt-2">
                    <a href="{{ route('galeri.edit', $galeri->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs px-3 py-1 rounded shadow">
                        Edit
                    </a>
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus gambar ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded shadow">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
