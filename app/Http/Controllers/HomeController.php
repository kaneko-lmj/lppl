<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\VisitorLog;

class HomeController extends Controller
{
    public function index()
    {
        // Hitung visitor hanya untuk halaman home
        $this->countVisitor('home');

        // Ambil 3 artikel terbaru
        $artikels = Artikel::latest()->take(3)->get();

        // Ambil total kunjungan ke halaman home
        $visits = VisitorLog::where('page', '/')->count();

        return view('public.home', compact('artikels', 'visits'));
    }

    private function countVisitor($page)
    {
        //$visitor = Visitor::firstOrCreate(['page' => $page]);
        //$visitor->increment('visits');
    }
}
