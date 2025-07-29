@extends('layouts.public')

@section('title', 'Talkshow')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-10">Talkshow</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($talkshows as $talkshow)
        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <img src="{{ asset('storage/' . $talkshow->poster) }}" alt="{{ $talkshow->judul }}" class="w-full h-96 object-cover">

            <div class="p-4 space-y-2">
                <h2 class="text-lg font-bold text-red-700">{{ $talkshow->judul }}</h2>
                <p class="text-sm text-gray-600">🗓️ {{ \Carbon\Carbon::parse($talkshow->tanggal)->translatedFormat('d F Y') }}</p>
                <p class="text-sm text-gray-600">⏰ {{ $talkshow->jam_mulai }} - {{ $talkshow->jam_selesai }}</p>
                <p class="text-sm text-gray-700">🎙️ Narasumber: {{ $talkshow->narasumber }}</p>

                <div class="flex items-center gap-4 mt-2">
                    @if($talkshow->youtube)
                    Klik link :
                    <a href="{{ $talkshow->youtube }}" target="_blank" class="text-red-600 hover:text-red-800">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                    @endif
                    @if($talkshow->facebook)
                    <a href="{{ $talkshow->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
