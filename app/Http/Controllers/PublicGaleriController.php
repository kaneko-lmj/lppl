<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class PublicGaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('tanggal_posting', 'desc')->paginate(12);
        return view('public.galeri', compact('galeris'));
    }
}
