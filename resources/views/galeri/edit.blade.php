@extends('layouts.app')
@section('title', 'Edit Galeri')
@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold text-red-800 mb-4">Galeri / Edit</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1" for="judul">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $galeri->judul) }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-red-400">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="tanggal_posting">Tanggal Posting <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_posting" id="tanggal_posting" value="{{ old('tanggal_posting', $galeri->tanggal_posting) }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-red-400">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Foto Saat Ini:</label>
            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Foto Galeri" class="w-48 h-48 object-cover rounded mb-2">
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1" for="foto">Ganti Foto (opsional)</label>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png"
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-red-400">
            <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
