@extends('layouts.admin')

@section('title', 'Arsipkan File')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Arsipkan File</h4>
        <a href="{{ route('arsip-surat.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Arsip
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('arsip-surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                    <input type="date" name="tanggal_arsip" id="tanggal_arsip" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Dokumen (PDF, DOC, DOCX, TXT)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.txt" required>
                    <div class="form-text">Maksimal ukuran: 10 MB</div>
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan (Opsional)</label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan ke Arsip
                </button>
            </form>
        </div>
    </div>
</div>
@endsection