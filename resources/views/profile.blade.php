@extends('layouts.app')

@section('title', 'Profile')

@section('header', 'Profil Saya')

@section('content')
    <div class="card shadow p-4">
        <h4>👤 Informasi Akun</h4>
        <ul class="list-group mt-3">
            <li class="list-group-item"><strong>Nama:</strong> Ultraman Cosmos</li>
            <li class="list-group-item"><strong>Email:</strong> ultraman@example.com</li>
            <li class="list-group-item"><strong>Role:</strong> Admin</li>
        </ul>

        <a href="/home" class="btn btn-primary mt-4">Kembali ke Home</a>
    </div>
@endsection
