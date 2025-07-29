@extends('layouts.app')
@section('title', 'Kelola Talkshow')
@section('content')

<div class="p-4">
   

    <!-- Search & Filter -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-red-700">Kelola Talkshow</h1>
        {{--<input type="text" placeholder="Search" class="border rounded px-4 py-2 w-1/2">--}} 
        <a href="{{ route('talkshows.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow">
            + Tambah Talkshow
        </a>
    </div>

    @foreach ($talkshows as $talkshow)
        <div class="bg-white rounded shadow p-4 mb-4 flex items-center space-x-4">
            <!-- Poster -->
            <img src="{{ asset('storage/' . $talkshow->poster) }}" class="w-32 h-32 object-cover rounded" alt="Poster">

            <!-- Info -->
            <div class="flex-1">
                <h2 class="font-bold text-lg">{{ $talkshow->judul }}</h2>
                <p class="text-sm text-gray-600 mb-1">Publish: {{ \Carbon\Carbon::parse($talkshow->tanggal)->translatedFormat('d F Y') }}</p>
                <p class="text-sm text-gray-600">Jam: 
                    {{ \Carbon\Carbon::parse($talkshow->jam_mulai)->format('H:i') }} - 
                    {{ \Carbon\Carbon::parse($talkshow->jam_selesai)->format('H:i') }} WIB</p>
                <p class="text-sm text-gray-600">Narasumber: {{ $talkshow->narasumber }}</p>

                <div class="flex items-center space-x-3">
                    @if($talkshow->youtube)
                        <a href="{{ $talkshow->youtube }}" target="_blank">
                            <i class="fab fa-youtube text-red-600 text-xl hover:text-red-800"></i>
                        </a>
                    @endif
                    @if($talkshow->facebook)
                        <a href="{{ $talkshow->facebook }}" target="_blank">
                            <i class="fab fa-facebook text-blue-600 text-xl hover:text-blue-800"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Action -->
            <div class="flex flex-col space-y-2">
                <a href="{{ route('talkshows.edit', $talkshow->id) }}" class="bg-yellow-400 text-black px-4 py-1 rounded shadow hover:bg-yellow-500">✏️ Edit</a>
                <form action="{{ route('talkshows.destroy', $talkshow->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded shadow hover:bg-red-700">🗑️ Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
