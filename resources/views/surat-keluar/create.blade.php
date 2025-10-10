@extends('layouts.admin')

@section('title', 'Tambah Surat Keluar')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Tambah Surat Keluar</h4>
        <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" id="tujuan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input type="text" name="perihal" id="perihal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Surat (PDF)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".pdf" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection