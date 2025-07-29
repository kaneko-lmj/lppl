@extends('layouts.app')
@section('title', 'Edit Dokumen')
@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-lg font-bold text-gray-700 mb-4">Edit Dokumen</h1>

    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $dokumen->judul) }}" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300">
        </div>

        {{-- File Baru --}}
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Unggah File Baru (PDF)</label>
            <input type="file" name="file" id="file" accept="application/pdf"
                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti file.</p>
        </div>

        {{-- File Lama --}}
        <div class="mb-4">
            <label class="block text-sm text-gray-600">File saat ini:</label>
            <a href="{{ asset('storage/dokumen/' . $dokumen->file) }}" target="_blank" class="text-red-600 hover:underline">
                {{ $dokumen->file }}
            </a>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-2">
            <a href="{{ route('dokumen.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
