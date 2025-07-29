@extends('layouts.app')
@section('title', 'Tambah Galeri')
@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold text-red-800 mb-4">Galeri / Tambah</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1" for="judul">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-red-400">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="tanggal_posting">Tanggal Posting <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_posting" id="tanggal_posting" value="{{ old('tanggal_posting') }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-red-400">
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1" for="foto">Foto <span class="text-red-500">*</span></label>
            <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" required
                   class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-red-400">
            <p class="text-sm text-gray-500 mt-1">Supported file types: PNG/JPG. Max size: 2MB.</p>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
