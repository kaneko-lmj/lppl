@extends('layouts.public')

@section('title', 'Jadwal Program')

@section('content')

<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold text-center text-red-700 mb-6">Jadwal Program Suara Lumajang</h1>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @foreach($jadwalPerHari as $hari => $items)
            <div class="swiper-slide bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-bold capitalize mb-4 text-center">{{ $hari }}</h2>

                @forelse($items as $item)
                    <div class="grid grid-cols-[120px_1fr] border-b py-2 text-sm md:text-base">
                        <div>{{ date('H.i', strtotime($item->jam_mulai)) }} - {{ date('H.i', strtotime($item->jam_selesai)) }}</div>
                        <div class="pl-4">{{ $item->judul }}</div>
                    </div>
                @empty
                    <p class="text-gray-500 italic text-center">Tidak ada jadwal</p>
                @endforelse
            </div>
            @endforeach

        </div>

        <!-- Pagination Dots -->
        <div class="swiper-pagination mt-6 flex justify-center"></div>
        
    </div>
</div>

@endsection
