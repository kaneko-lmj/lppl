@extends('layouts.app')
@section('title', 'Kelola Artikel')
@section('content')

<div class="max-w-6xl mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-red-700">Kelola Artikel</h1>
        <a href="{{ route('artikels.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow">
            + Tambah Artikel
        </a>
    </div>
    
    <div class="flex justify-between mb-4">
        {{--<input type="text" placeholder="Cari" class="form-input w-1/3">
        <button class="bg-gray-200 px-4 py-2 rounded flex items-center gap-2">
            <i class="fas fa-filter"></i> Filter
        </button>--}}
    </div>

    <div class="space-y-4">
        @foreach($artikels as $artikel)
        <div class="bg-white p-4 rounded shadow flex gap-4 items-start">
            <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" alt="Thumbnail" class="w-32 h-24 object-cover rounded">

            <div class="flex-1">
                <h2 class="font-bold text-lg">{{ $artikel->judul }}</h2>
                <span class="text-sm bg-red-100 text-red-600 border border-red-300 rounded px-2 py-1 inline-block my-2">
                    {{ $artikel->kategori }}
                </span>
                <p class="text-sm text-gray-600">Author: {{ $artikel->penulis }}</p>
                <p class="text-sm text-gray-600">Redaktur: {{ $artikel->redaktur }}</p>
                <p class="text-sm text-gray-600">Posting: {{ \Carbon\Carbon::parse($artikel->tanggal_posting)->format('d F Y') }}</p>
            </div>

            <div class="flex flex-col items-center justify-center gap-2">
                <a href="{{ route('artikels.edit', $artikel->id) }}" class="bg-yellow-400 text-black px-4 py-2 rounded text-sm">
                    ✏️ Edit
                </a>
                <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded text-sm">🗑️ Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
