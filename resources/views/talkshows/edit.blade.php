@extends('layouts.app')
@section('title', 'Edit Talkshow')
@section('content')

<div class="p-4">
    <h1 class="text-2xl font-bold text-red-700 mb-6">Edit Talkshow</h1>
    
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
    
    <form action="{{ route('talkshows.update', $talkshow->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div>
            <label class="block mb-1 font-semibold">Judul Talkshow</label>
            <input type="text" name="judul" class="form-input w-full" value="{{ old('judul', $talkshow->judul) }}" required>
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block mb-1 font-semibold">Tanggal On Air</label>
            <input type="date" name="tanggal" class="form-input w-full" value="{{ old('tanggal', $talkshow->tanggal) }}" required>
        </div>
       
        <div>
            <label class="block font-semibold mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-input w-full" value="{{ old('jam_mulai', \Illuminate\Support\Str::of($talkshow->jam_mulai)->limit(5, '')) }}" required>
        </div>
    
        <div>
            <label class="block font-semibold mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-input w-full" value="{{ old('jam_selesai', \Illuminate\Support\Str::of($talkshow->jam_selesai)->limit(5, '')) }}" required>
        </div>
        
        <div>
            <label class="block font-semibold mb-1">Narasumber</label>
            <input type="string" name="narasumber" class="form-input w-full" value="{{ old('narasumber', $talkshow->narasumber) }}" required>
        </div>
        <!-- Youtube -->
        <div>
            <label class="block mb-1 font-semibold">Link Youtube Talkshow</label>
            <input type="url" name="youtube" class="form-input w-full" value="{{ old('youtube', $talkshow->youtube) }}">
        </div>

        <!-- Facebook -->
        <div>
            <label class="block mb-1 font-semibold">Link Facebook Talkshow</label>
            <input type="url" name="facebook" class="form-input w-full" value="{{ old('facebook', $talkshow->facebook) }}">
        </div>

        <!-- Poster -->
        <div>
            <label class="block mb-1 font-semibold">Poster Talkshow</label>
            @if ($talkshow->poster)
                <img src="{{ asset('storage/' . $talkshow->poster) }}" alt="Poster" class="w-32 mb-2">
            @endif
            <input type="file" name="poster" class="form-input w-full">
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800">Update</button>
        </div>
    </form>
</div>

@endsection
