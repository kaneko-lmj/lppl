<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\VisitorLog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statistik
        $totalArtikel = Artikel::count();
        $totalUser = User::count();
        $totalDokumen = Dokumen::count();
        $totalGaleri = Galeri::count();
        $totalVisitor = VisitorLog::where('page', '/')->count();

        // Top 3 artikel populer
        $top3Artikel = Artikel::orderByDesc('view_count')->take(3)->get();

        // Hari-hari dalam seminggu
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        // Ambil data visitor dari halaman home minggu ini
        $visitorLogs = VisitorLog::selectRaw('DAYNAME(created_at) as day, COUNT(*) as total')
            ->where('page', '/')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('day')
            ->get();

        // Format hasil per hari
        $weeklyVisitors = collect($days)->map(function ($day) use ($visitorLogs) {
            return $visitorLogs->firstWhere('day', $day)->total ?? 0;
        });

        // Data untuk grafik
        $visitorLabels = collect($days);
        $visitorData = collect($days)->map(function ($day) use ($visitorLogs) {
            return $visitorLogs->firstWhere('day', $day)->total ?? 0;
        });

        return view('dashboard', compact(
            'totalArtikel',
            'totalUser',
            'totalDokumen',
            'totalGaleri',
            'totalVisitor',
            'top3Artikel',
            'weeklyVisitors',
            'visitorLabels',
            'visitorData'
        ));
    }
}
