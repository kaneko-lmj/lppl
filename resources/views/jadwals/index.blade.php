@extends('layouts.app')
@section('title', 'Kelola Jadwal Program')
@section('content')

<div class="p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-red-700">Kelola Jadwal Program</h1>
        <a href="{{ route('jadwals.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow">
            + Tambah Jadwal
        </a>
    </div>

    @php
        $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
    @endphp

    @foreach ($hariList as $hari)
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 border-b border-gray-300 pb-1 mb-2">{{ $hari }}</h2>

            @php
                $dataHari = $jadwals->where('hari', $hari)->sortBy('jam_mulai');
            @endphp

            @if ($dataHari->count())
                @foreach ($dataHari as $jadwal)
                    <div class="bg-white p-4 rounded shadow mb-3 flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <p class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                            </p>
                            <p class="font-bold">{{ $jadwal->judul }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('jadwals.edit', $jadwal->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-sm text-gray-500 italic">Belum ada jadwal untuk hari ini.</p>
            @endif
        </div>
    @endforeach
</div>

@endsection
