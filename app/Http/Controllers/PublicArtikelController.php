<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class PublicArtikelController extends Controller
{
    public function index() {
        $artikels = Artikel::latest()->paginate(6);
        return view('public.artikel.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        //Menambah jumlah pembaca
        $artikel->increment('view_count');
        $rekomendasi = Artikel::where('id', '!=', $artikel->id)
                          ->where('kategori', $artikel->kategori)
                          ->inRandomOrder()
                          ->take(5)
                          ->get();
        $beritaTerbaru = Artikel::latest()->take(3)->get();

        return view('public.artikel.show', compact('artikel', 'rekomendasi', 'beritaTerbaru'));
    }

    public function kategori($kategori) {
        $artikels = Artikel::where('kategori', $kategori)->latest()->paginate(6);
        return view('public.artikel.index', compact('artikels', 'kategori'));
    }
}
