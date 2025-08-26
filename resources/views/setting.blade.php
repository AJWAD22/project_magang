@extends('layouts.app')

@section('title', 'Settings')

@section('header', 'Pengaturan Akun')

@section('content')
    <div class="card shadow p-4">
        <h4>⚙️ Pengaturan</h4>
        <form>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" value="Ultraman Cosmos">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="ultraman@example.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" class="form-control" placeholder="••••••">
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
@endsection
