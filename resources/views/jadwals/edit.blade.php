@extends('layouts.app')
@section('title', 'Edit Jadwal Program')
@section('content')

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-red-700">Edit Jadwal</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Ups!</strong> Ada masalah dengan inputanmu:<br><br>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div>
            <label class="block font-semibold mb-1">Hari</label>
            <select name="hari" class="form-input w-full" required>
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                    <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <!-- Jam Mulai -->
        <div>
            <label class="block font-semibold mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-input w-full" value="{{ old('jam_mulai', \Illuminate\Support\Str::of($jadwal->jam_mulai)->limit(5, '')) }}" required>
        </div>

        <!-- Jam Selesai -->
        <div>
            <label class="block font-semibold mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-input w-full" value="{{ old('jam_selesai', \Illuminate\Support\Str::of($jadwal->jam_selesai)->limit(5, '')) }}" required>
        </div>

        <!-- Acara -->
        <div>
            <label class="block font-semibold mb-1">Acara</label>
            <input type="text" name="judul" class="form-input w-full" value="{{ old('judul', $jadwal->judul) }}" required>
        </div>

        <!-- Tombol Simpan -->
        <div class="text-right">
            <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800">Update</button>
        </div>
    </form>
</div>

@endsection
