@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold text-red-700 mb-6">Tambah Pengguna</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label class="form-label">Nama Lengkap*</label>
            <input type="text" name="name" class="form-input" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="form-label">Email*</label>
            <input type="email" name="email" class="form-input" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="form-label">Password*</label>
            <input type="password" name="password" class="form-input" required>
        </div>

        <!-- Role -->
        <div class="mb-6">
            <label class="form-label">Peran*</label>
            <select name="role" class="form-input" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin Sistem</option>
                <option value="redaktur">Redaktur</option>
                <option value="program">Admin Program</option>
                <option value="superadmin">Super Admin</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <div class="text-right">
            <button type="submit" class="btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
