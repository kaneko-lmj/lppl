@extends('layouts.public')

@section('title', 'Tim Suara Lumajang')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-10">Tim Suara Lumajang</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($teams as $member)
            <div class="rounded-xl overflow-hidden shadow-lg bg-white">
                <div class="bg-red-600 bg-cover bg-center h-72 flex items-center justify-center"
                     style="background-image: url('{{ asset('storage/team/bg.jpg') }}');">
                    <img src="{{ asset('storage/' . $member->foto) }}"
                         alt="{{ $member->nama }}"
                         class="w-56 h-56 object-cover rounded-full shadow-md border-4 border-white">
                </div>
                <div class="bg-red-700 text-white text-center py-2">
                    <h2 class="text-sm font-bold uppercase tracking-wide">{{ $member->nama }}</h2>
                    <p class="text-xs">{{ $member->jabatan }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
