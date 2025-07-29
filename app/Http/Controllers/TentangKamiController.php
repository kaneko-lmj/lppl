<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class TentangKamiController extends Controller
{
    public function index()
    {
        // Ambil hanya dokumen kategori perizinan
        $dokumenPerizinan = Dokumen::where('status', 'aktif')->get();

        return view('public.about', compact('dokumenPerizinan'));
    }
}
