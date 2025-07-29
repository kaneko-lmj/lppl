<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = Dokumen::latest()->get();
        return view('dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required|string|max:255',
            'file'=>'required|mimes:pdf|max:2048',
        ]);

        // Simpan file
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $ukuran = round($file->getSize() / 1024) . ' KB'; // ukuran dalam KB
        $tanggal = now()->format('Y-m-d');

        $file->storeAs('dokumen', $filename, 'public');

        Dokumen::create([
            'judul' => $request->judul,
            'file' => $filename,
            'ukuran' => $ukuran,
            'tanggal' => $tanggal,
            'status' => 'Tidak Aktif'
        ]);

    return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
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
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($dokumen->file && \Storage::disk('public')->exists('dokumen/' . $dokumen->file)) {
                \Storage::disk('public')->delete('dokumen/' . $dokumen->file);
            }

            // Simpan file baru
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $ukuran = round($file->getSize() / 1024) . ' KB';
            $tanggal = now()->format('Y-m-d');

            $file->storeAs('dokumen', $filename, 'public');

            $data['file'] = $filename;
            $data['ukuran'] = $ukuran;
            $data['tanggal'] = $tanggal;
        }

        $dokumen->update($data);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        // Hapus file
        if ($dokumen->file && \Storage::disk('public')->exists('dokumen/' . $dokumen->file)) {
            \Storage::disk('public')->delete('dokumen/' . $dokumen->file);
        }

        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $dokumen->status = $request->status;
        $dokumen->save();

        return redirect()->back()->with('success', 'Status dokumen berhasil diperbarui.');
    }

}
