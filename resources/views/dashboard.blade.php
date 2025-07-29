@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-gradient-to-r from-red-700 to-red-600 text-white rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Total Artikel</h3>
                    <p class="text-3xl font-bold">{{ $totalArtikel }}</p>
                    {{-- <p class="text-sm text-white/80 mt-2">Last month total 1.050</p> --}}
                </div>
                <div class="text-4xl">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-red-700 to-red-600 text-white rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Total Visitor</h3>
                    <p class="text-3xl font-bold">{{ $totalVisitor }}</p>
                    {{-- <p class="text-sm text-white/80 mt-2">Last month total 1.050</p> --}}
                </div>
                <div class="text-4xl">
                    <i class="fas fa-user-friends"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-red-700">Data Pengunjung</h2>
            <div class="text-sm text-gray-500"><i class="fas fa-calendar-alt mr-1"></i> Mingguan</div>
        </div>
        <div class="relative h-64">
            <canvas id="visitorChart" class="absolute inset-0"></canvas>
        </div>                
    </div>

    <div>
        <h2 class="text-2xl font-bold text-red-700 mb-4">Top 3 Artikel</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($top3Artikel as $artikel)
                <div class="rounded overflow-hidden shadow hover:shadow-lg transition duration-200">
                    <img src="{{ asset('storage/' . $artikel->dokumentasi) }}" class="h-56 w-full object-cover" alt="{{ $artikel->judul }}">
                    <div class="p-4">
                        <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded">{{$artikel->kategori}}</span> |
                        <span class="text-sm text-gray-500"><i class="fas fa-eye mr-2"></i> {{ $artikel->view_count }}</span>
                        <h3 class="text-lg font-bold">{{ $artikel->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ Str::limit($artikel->isi, 100) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($visitorLabels) !!},
                datasets: [{
                    label: 'Visitors',
                    data: {!! json_encode($visitorData) !!},
                    borderColor: '#b91c1c',
                    backgroundColor: 'rgba(185, 28, 28, 0.1)',
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value >= 1000 ? value / 1000 + 'k' : value;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
