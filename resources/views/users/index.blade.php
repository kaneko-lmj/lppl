@extends('layouts.app')
@section('title', 'Kelola Pengguna')
@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-red-700">Kelola Pengguna</h2>
        <a href="{{ route('users.create') }}" class="px-3 py-1 text-md font-semibold text-white bg-red-500 rounded hover:bg-red-600">Tambah Pengguna</a>
    </div>
    <!-- Notifikasi sukses -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Role</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="flex justify-center items-center space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="px-3 py-1 text-xs font-semibold text-white bg-yellow-500 rounded hover:bg-yellow-600">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded hover:bg-red-700">
                                    🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">Belum ada pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
