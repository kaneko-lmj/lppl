@extends('layouts.app')
@section('title', 'Edit Artikel')
@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-red-700">Edit Artikel</h1>

    <form action="{{ route('artikels.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Judul Artikel --}}
        <div>
            <label class="block font-semibold mb-1">Judul Artikel*</label>
            <input type="text" name="judul" class="form-input w-full" value="{{ old('judul', $artikel->judul) }}" required>
        </div>

        {{-- Dokumentasi --}}
        <div>
            <label class="block font-semibold mb-1">Dokumentasi*</label>
            @if($artikel->dokumentasi)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" class="w-32 rounded shadow" alt="Dokumentasi">
                </div>
            @endif
            <input type="file" name="dokumentasi" accept="image/*" class="form-input w-full">
        </div>

        {{-- Fotografer --}}
        <div>
            <label class="block font-semibold mb-1">Fotografer</label>
            <input type="text" name="fotografer" class="form-input w-full" value="{{ old('fotografer', $artikel->fotografer) }}">
        </div>

        {{-- Penulis --}}
        <div>
            <label class="block font-semibold mb-1">Penulis*</label>
            <input type="text" name="penulis" class="form-input w-full" value="{{ old('penulis', $artikel->penulis) }}" required>
        </div>

        {{-- Redaktur --}}
        <div>
            <label class="block font-semibold mb-1">Redaktur*</label>
            <input type="text" name="redaktur" class="form-input w-full" value="{{ old('redaktur', $artikel->redaktur) }}" required>
        </div>

        {{-- Tanggal Posting --}}
        <div>
            <label class="block font-semibold mb-1">Tanggal Posting*</label>
            <input type="date" name="tanggal_posting" class="form-input w-full" value="{{ old('tanggal_posting', $artikel->tanggal_posting->format('Y-m-d')) }}" required>
        </div>

        {{-- Isi Artikel --}}
        <div>
            <label class="block font-semibold mb-1">Isi Artikel*</label>
            <textarea name="isi" class="form-textarea w-full" rows="6" required>{{ old('isi', $artikel->isi) }}</textarea>
        </div>

        {{-- Jenis Kategori --}}
        <div>
            <label class="block font-semibold mb-1">Jenis Kategori*</label>
            <select name="kategori" class="form-select w-full" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach([
                    'Pemerintahan',
                    'Keagamaan',
                    'Infrastruktur',
                    'Lingkungan Hidup',
                    'Pertanian',
                    'Pendidikan',
                    'Olahraga & Kesehatan',
                    'Kebencanaan',
                    'Ekonomi & Sosial',
                    'Politik & Hukum',
                    'Wisata & Kuliner',
                    'Komoditas & Perdagangan',
                    'Seni & Budaya'
                ] as $kategori)
                    <option value="{{ $kategori }}" {{ old('kategori', $artikel->kategori) == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tombol Update --}}
        <div class="text-right">
            <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800">Update</button>
        </div>
    </form>
</div>

@endsection
