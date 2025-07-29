<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InformasiController extends Controller
{
    public function index()
    {
        return view('admin.informasi');
    }

    public function update(Request $request)
    {
        $request->validate([
            'informasi' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $path = public_path('informasi/informasi.jpg');

        // Hapus file lama
        if (File::exists($path)) {
            File::delete($path);
        }

        // Simpan file baru
        $request->file('informasi')->move(public_path('informasi'), 'informasi.jpg');

        return back()->with('success', 'Gambar informasi berhasil diperbarui.');
    }//
}
