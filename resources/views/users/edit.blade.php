@extends('layouts.app')
@section('title', 'Ubah Pengguna')
@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-blue-600">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="form-label">Peran</label>
            <select name="role" class="form-input" required>
                <option value="">-- Pilih Role --</option>
                @foreach (['Admin Sistem', 'Redaktur', 'Admin Program', 'Super Admin'] as $role)
                    <option value="{{ $role }}" @if($user->role == $role) selected @endif>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Password (Opsional) -->
        <div class="mb-4">
            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-input">
            <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah password.</p>
        </div>

        <div class="text-right">
            <button class="px-3 py-1 text-md font-semibold text-white bg-green-500 rounded hover:bg-green-600">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
