<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class PublicJadwalController extends Controller
{
    public function index()
{
    // Ambil semua jadwal lalu kelompokkan per hari
    $jadwalPerHari = Jadwal::orderBy('jam_mulai')->get()->groupBy('hari');

    // Urutkan secara manual berdasarkan urutan hari
    $urutanHari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

    // Filter dan urutkan data sesuai urutan hari
    $jadwalPerHari = collect($urutanHari)->mapWithKeys(function($hari) use ($jadwalPerHari) {
        return [$hari => $jadwalPerHari[$hari] ?? collect()];
    });

    return view('public.jadwal', compact('jadwalPerHari'));
}
}
