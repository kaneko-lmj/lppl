<?php

namespace App\Http\Controllers;

use App\Models\Talkshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class TalkshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talkshows = Talkshow::latest()->get();
        return view('talkshows.index', compact('talkshows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talkshows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i',
            'narasumber' => 'nullable|string|max:255',
            'youtube' => 'nullable|url',
            'facebook' => 'nullable|url',
            'poster' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        $data = $request->only(['judul', 'tanggal', 'jam_mulai', 'jam_selesai', 'narasumber', 'youtube', 'facebook']);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Talkshow::create($data);

        return redirect()->route('talkshows.index')->with('success', 'Talkshow berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Talkshow $talkshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talkshow $talkshow)
    {
        return view('talkshows.edit', compact('talkshow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talkshow $talkshow)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i',
            'narasumber' => 'nullable|string|max:255',
            'youtube' => 'nullable|url',
            'facebook' => 'nullable|url',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'narasumber' => $request->narasumber,
            'youtube' => $request->youtube,
            'facebook' => $request->facebook,
        ];

        if ($request->hasFile('poster')) {
            if ($talkshow->poster && Storage::disk('public')->exists($talkshow->poster)) {
                Storage::disk('public')->delete($talkshow->poster);
            }

            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $talkshow->update($data);

        return redirect()->route('talkshows.index')->with('success', 'Talkshow berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talkshow $talkshow)
    {
        if ($talkshow->poster && Storage::disk('public')->exists($talkshow->poster)) {
            Storage::disk('public')->delete($talkshow->poster);
        }
        $talkshow->delete();
        return redirect()->route('talkshows.index')->with('success', 'Data berhasil dihapus');
    }
}
