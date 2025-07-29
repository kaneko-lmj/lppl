@extends('layouts.app')
@section('title', 'Buat Artikel')
@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-red-700">Buat Artikel</h1>

    <form action="{{ route('artikels.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" class="form-input w-full" value="{{ old('judul') }}" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Dokumentasi (Gambar)</label>
            <input type="file" name="dokumentasi" class="form-input w-full">
        </div>

        <div>
            <label class="block font-semibold mb-1">Fotografer</label>
            <input type="text" name="fotografer" class="form-input w-full" value="{{ old('fotografer') }}">
        </div>

        <div>
            <label class="block font-semibold mb-1">Penulis</label>
            <input type="text" name="penulis" class="form-input w-full" value="{{ old('penulis') }}" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Redaktur</label>
            <input type="text" name="redaktur" class="form-input w-full" value="{{ old('redaktur') }}" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Posting</label>
            <input type="date" name="tanggal_posting" class="form-input w-full" value="{{ old('tanggal_posting') }}" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Isi Artikel</label>
            <textarea name="isi" rows="6" class="form-input w-full" required>{{ old('isi') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Kategori</label>
            <select name="kategori" class="form-input w-full" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ([
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
                    <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded shadow">
                Simpan Artikel
            </button>
        </div>
    </form>
</div>

@endsection
