<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = team::all();
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('team', 'public');

        Team::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('team.index')->with('success', 'Team berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $team = Team::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($team->foto);
            // Simpan yang baru
            $data['foto'] = $request->file('foto')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('team.index')->with('success', 'Data tim berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($team->foto && \Storage::exists($team->foto)) {
            \Storage::delete($team->foto);
        }

        $team->delete();

        return redirect()->route('team.index')->with('success', 'Data tim berhasil dihapus.');
    }
}
