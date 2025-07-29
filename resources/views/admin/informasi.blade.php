@extends('layouts.app')
@section('title', 'Kelola Informasi')
@section('content')
<div class="max-w-xl mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-lg font-bold mb-4">Ganti Gambar Informasi</h2>

    @if(session('success'))
        <div class="p-2 bg-green-100 text-green-800 rounded mb-3">{{ session('success') }}</div>
    @endif

    <form action="{{ route('informasi.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="informasi" class="block font-medium mb-1">Upload Gambar (.jpg/.png)</label>
            <input type="file" name="informasi" id="informasi" class="w-full p-2 border rounded">
            @error('informasi')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Gambar
        </button>
    </form>

    <div class="mt-6">
        <h3 class="font-semibold mb-2">Gambar Saat Ini:</h3>
        <img src="{{ asset('informasi/informasi.jpg') }}?{{ time() }}" alt="Informasi" class="w-full max-w-sm rounded border">
    </div>
</div>
@endsection
