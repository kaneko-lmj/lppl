@extends('layouts.app')
@section('title', 'Tambah Jadwal Program')
@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-red-700">Tambah Jadwal</h1>

    <form action="{{ route('jadwals.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Hari --}}
        <div>
            <label class="block font-semibold mb-1">Hari</label>
            <select name="hari" class="form-select w-full" required>
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                    <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        {{-- Jam Mulai --}}
        <div>
            <label class="block font-semibold mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-input w-full" value="{{ old('jam_mulai') }}" required>
        </div>

        {{-- Jam Selesai --}}
        <div>
            <label class="block font-semibold mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-input w-full" value="{{ old('jam_selesai') }}" required>
        </div>

        {{-- Acara --}}
        <div>
            <label class="block font-semibold mb-1">Judul Acara</label>
            <input type="text" name="judul" class="form-input w-full" value="{{ old('judul') }}" required>
        </div>

        {{-- Tombol Simpan --}}
        <div class="text-right">
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection
