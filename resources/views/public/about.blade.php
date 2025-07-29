@extends('layouts.public')
@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-7xl mx-auto p-4 space-y-10">

    {{-- VISI MISI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        <img src="{{ asset('images/gedung.jpg') }}" alt="Gedung LPPL" class="rounded-xl shadow">
        <div>
            <h2 class="text-xl font-bold">Dasar Hukum</h2>
            <p class="text-gray-700 mb-4">
                Peraturan Daerah No.5 Tahun 2017 tentang Pembentukan Lembaga Penyiaran Publik Lokal Radio Suara Lumajang Kabupaten Lumajang.
            </p>
            <p class="text-gray-700 mb-4">
                Peraturan Bupati No.23 Tahun 2023 tentang Peraturan Pelaksanaan Peraturan Daerah Nomor 5 Tahun 2017 tentang Lembaga Penyiaran Publik Lokal Radio Suara Lumajang.
            </p>
            <h2 class="text-xl font-bold">Tujuan</h2>
            <p class="text-gray-700">
                Menyajikan program siaran yang mendorong terwujudnya sikap mental masyarakat yang beriman dan bertaqwa, cerdas, memperkukuh integrasi nasional dalam rangka membangun masyarakat mandiri, demokrasi, adil dan sejahtera, serta menjaga citra positif bangsa.
            </p>
        </div>
    </div>

    {{-- DOKUMEN PERIZINAN --}}
    <div class="text-center">
        <h2 class="text-2xl font-bold text-red-700 mb-6">Dokumen Perizinan</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @forelse ($dokumenPerizinan as $dokumen)
                <div class="bg-white rounded shadow p-4">
                    <h3 class="font-semibold text-lg mb-2">{{ $dokumen->judul }}</h3>
                    <iframe src="{{ asset('storage/dokumen/' . $dokumen->file) }}" class="w-full h-64 rounded" frameborder="0"></iframe>
                    <a href="{{ asset('storage/dokumen/' . $dokumen->file) }}" target="_blank" class="text-blue-600 hover:underline block mt-2">Lihat Dokumen</a>
                </div>
            @empty
                <p class="text-gray-600">Belum ada dokumen perizinan.</p>
            @endforelse
        </div>
    </div>

    {{-- KONTAK & PETA --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <iframe class="w-full h-64 rounded shadow" src="https://maps.google.com/maps?q=lumajang&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
        <div>
            <h2 class="text-xl font-bold mb-4">Hubungi Kontak Kami</h2>
            <ul class="space-y-2 text-gray-700">
                <li>📞 0334 444104</li>
                <li>📧 suaralumajangradio@gmail.com</li>
                <li>📱 +62 853-3333-1004</li>
                <li>📘 Lppl Suara Lumajang</li>
                <li>📻 suaralumajang104.1</li>
            </ul>
        </div>
    </div>

</div>
@endsection
