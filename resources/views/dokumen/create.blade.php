@extends('layouts.app')
@section('title', 'Tambah Dokumen')
@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-lg font-bold text-gray-700 mb-4">Tambah Dokumen</h1>

    <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Judul --}}
        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Dokumen</label>
            <input type="text" name="judul" id="judul" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-300">
        </div>

        {{-- File Upload --}}
        <div>
            <label for="file" class="block text-sm font-medium text-gray-700">Unggah File (PDF)</label>
            <input type="file" name="file" id="file" accept="application/pdf" required
                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-2">
            <a href="{{ route('dokumen.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Unggah</button>
        </div>
    </form>
</div>
@endsection
