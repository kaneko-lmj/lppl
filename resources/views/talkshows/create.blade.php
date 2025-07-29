@extends('layouts.app')
@section('title', 'Publikasi Talkshow')
@section('content')

<div class="bg-white shadow rounded p-6 w-full max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-red-800 mb-4">Publish Talkshow</h1>

    <form action="{{ route('talkshows.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Judul Talkshow</label>
            <input type="text" name="judul" class="form-input w-full" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal On Air</label>
            <input type="date" name="tanggal" class="form-input w-full" required>
        </div>
    
        <div>
            <label class="block font-semibold mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-input w-full">
        </div>
    
        <div>
            <label class="block font-semibold mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-input w-full">
        </div>
        
        <div>
            <label class="block font-semibold mb-1">Narasumber</label>
            <input type="text" name="narasumber" class="form-input w-full">
        </div>
        
        <div>
            <label class="block font-semibold mb-1">Link Youtube Talkshow</label>
            <input type="url" name="youtube" class="form-input w-full">
        </div>

        <div>
            <label class="block font-semibold mb-1">Link Facebook Talkshow</label>
            <input type="url" name="facebook" class="form-input w-full">
        </div>

        <div>
            <label class="block font-semibold mb-1">Poster Talkshow</label>
            <input type="file" name="poster" class="form-input w-full">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded shadow">
                Publish
            </button>
        </div>
    </form>
</div>

@endsection
