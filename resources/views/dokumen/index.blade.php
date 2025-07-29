@extends('layouts.app')
@section('title', 'Kelola Dokumen')
@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-red-700">Kelola Dokumen</h1>
        <a href="{{ route('dokumen.create') }}"
           class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 shadow">
            + Tambah Dokumen
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="p-2">#</th>
                    <th class="p-2">Judul</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Ukuran</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokumen as $index => $d)
                    <tr class="border-t">
                        <td class="p-2">{{ $index + 1 }}</td>
                        <td class="p-2">{{ $d->judul }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($d->tanggal)->format('d M Y') }}</td>
                        <td class="p-2">{{ $d->ukuran }}</td>
                        <td class="p-2">
                            <form action="{{ route('dokumen.updateStatus', $d->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="border-gray-300 rounded">
                                    <option value="Aktif" {{ $d->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $d->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-2 flex flex-wrap gap-2">
                            <a href="{{ route('dokumen.edit', $d->id) }}"
                               class="text-green-600 hover:underline">Edit</a>
                            <a href="{{ asset('storage/dokumen/' . $d->file) }}" target="_blank"
                               class="text-blue-600 hover:underline">Download</a>
                            <form action="{{ route('dokumen.destroy', $d->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Belum ada dokumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
