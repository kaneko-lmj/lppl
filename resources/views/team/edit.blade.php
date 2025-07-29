@extends('layouts.app')
@section('title', 'Edit Tim')
@section('content')

<div class="p-4">
    <h1 class="text-2xl font-bold text-red-700 mb-4">Team / Edit Team</h1>

    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-4">
            <label for="nama" class="block font-semibold">Nama<span class="text-red-500">*</span></label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $team->nama) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-red-300">
            @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Jabatan --}}
        <div class="mb-4">
            <label for="jabatan" class="block font-semibold">Jabatan<span class="text-red-500">*</span></label>
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $team->jabatan) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-red-300">
            @error('jabatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Foto --}}
        <div class="mb-4">
            <label for="foto" class="block font-semibold">Foto <span class="text-gray-500 text-sm">(Kosongkan jika tidak diganti)</span></label>
            
            <div class="mb-2">
                <img src="{{ asset('storage/' . $team->foto) }}" alt="Foto" class="w-20 h-20 object-cover rounded-full">
            </div>

            <input type="file" name="foto" id="foto" accept="image/*" class="mt-2">
            @error('foto') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Tombol Simpan --}}
        <div class="text-right">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">Update</button>
        </div>
    </form>
</div>

@endsection
