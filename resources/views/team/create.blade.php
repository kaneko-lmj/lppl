@extends('layouts.app')
@section('title', 'Tambah Tim')
@section('content')

<div class="p-4">
    <h1 class="text-2xl font-bold text-red-700 mb-4">Team / Tambah Team</h1>

    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        {{-- Nama --}}
        <div class="mb-4">
            <label for="nama" class="block font-semibold">Nama<span class="text-red-500">*</span></label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-red-300">
            @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Jabatan --}}
        <div class="mb-4">
            <label for="jabatan" class="block font-semibold">Jabatan<span class="text-red-500">*</span></label>
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-red-300">
            @error('jabatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-4">
            <label for="foto" class="block font-semibold">Foto<span class="text-red-500">*</span></label>
            <div class="w-full border border-dashed border-gray-300 rounded-lg p-6 flex flex-col items-center justify-center text-gray-500">
                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12m-9 4h10a1 1 0 001-1v-2a1 1 0 00-1-1H6a1 1 0 00-1 1v2a1 1 0 001 1z" />
                </svg>
                <span>Drop your files or click to upload</span>
                <input type="file" name="foto" id="foto" accept="image/*" class="mt-2">
            </div>
            @error('foto') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Tombol Simpan --}}
        <div class="text-right">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">Simpan</button>
        </div>
    </form>
</div>

@endsection
