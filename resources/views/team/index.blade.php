@extends('layouts.app')
@section('title', 'Kelola Tim')
@section('content')

<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-red-700">Team</h1>
        <a href="{{ route('team.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
            Tambah Team
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($teams as $team)
            <div class="bg-white rounded-lg shadow p-4 flex">
                <div class="w-1 bg-red-600 rounded-l-lg mr-3"></div>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . $team->foto) }}" alt="{{ $team->nama }}" class="w-16 h-16 rounded-full object-cover">
                    <div>
                        <h2 class="font-bold text-lg">{{ $team->nama }}</h2>
                        <p class="text-sm text-gray-700">{{ $team->jabatan }}</p>
                        <div class="mt-2 flex space-x-2">
                            <a href="{{ route('team.edit', $team->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('team.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
