<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('artikels.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artikel = new Artikel; // kosong, hanya untuk menghindari error view
        return view('artikels.create', compact('artikel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'dokumentasi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'fotografer' => 'nullable|string|max:100',
            'penulis' => 'required|string|max:100',
            'redaktur' => 'required|string|max:100',
            'tanggal_posting' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string|in:Pemerintahan,Keagamaan,Infrastruktur,Lingkungan Hidup,Pertanian,Pendidikan,Olahraga & Kesehatan,Kebencanaan,Ekonomi & Sosial,Politik & Hukum,Wisata & Kuliner,Komoditas & Perdagangan,Seni & Budaya',
        ]);

        $validated['dokumentasi'] = $request->file('dokumentasi')->store('artikel', 'public');

        Artikel::create($validated);

        return redirect()->route('artikels.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        $artikel->increment('view_count'); // Naikkan view count

        return view('public.artikels.show', compact('artikel'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikels.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'fotografer' => 'nullable|string|max:100',
            'penulis' => 'required|string|max:100',
            'redaktur' => 'required|string|max:100',
            'tanggal_posting' => 'required|date',
            'isi' => 'required|string',
            'kategori' => 'required|string',
            'dokumentasi' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update slug otomatis
        $artikel->slug = \Str::slug($request->judul);

        // Cek apakah upload file baru
        if ($request->hasFile('dokumentasi')) {
            // Hapus dokumentasi lama kalau ada
            if ($artikel->dokumentasi && \Storage::exists($artikel->dokumentasi)) {
                \Storage::delete($artikel->dokumentasi);
            }

            // Simpan file baru
            $path = $request->file('dokumentasi')->store('artikels', 'public');
            $artikel->dokumentasi = $path;
        }

        // Update field lainnya
        $artikel->judul = $request->judul;
        $artikel->fotografer = $request->fotografer;
        $artikel->penulis = $request->penulis;
        $artikel->redaktur = $request->redaktur;
        $artikel->tanggal_posting = $request->tanggal_posting;
        $artikel->isi = $request->isi;
        $artikel->kategori = $request->kategori;

        $artikel->save();

        return redirect()->route('artikels.index')->with('success', 'Artikel berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $artikel = Artikel::findOrFail($id);

        // Hapus file dokumentasi dari storage (jika ada)
        if ($artikel->dokumentasi && \Storage::disk('public')->exists($artikel->dokumentasi)) {
            \Storage::disk('public')->delete($artikel->dokumentasi);
        }

        $artikel->delete();

        return redirect()->route('artikels.index')->with('success', 'Artikel berhasil dihapus.');
    }

    
}
