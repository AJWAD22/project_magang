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

                <!-- Nomor Surat (Format: Nomor Unit / Nomor Berkas) -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomor_unit" class="form-label">Nomor Unit</label>
                        <input type="text" name="nomor_unit" id="nomor_unit" class="form-control" placeholder="Contoh: 800/678" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_berkas" class="form-label">Nomor Berkas</label>
                        <input type="text" name="nomor_berkas" id="nomor_berkas" class="form-control" placeholder="Contoh: 005/678.1" required>
                    </div>
                </div>

                <!-- Alamat Penerima -->
                <div class="mb-3">
                    <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                    <textarea name="alamat_penerima" id="alamat_penerima" class="form-control" rows="3" required></textarea>
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" required>
                </div>

                <!-- Perihal -->
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <textarea name="perihal" id="perihal" class="form-control" rows="3" required></textarea>
                </div>

                <!-- Nomor Petunjuk & Nomor Paket -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomor_petunjuk" class="form-label">Nomor Petunjuk</label>
                        <input type="text" name="nomor_petunjuk" id="nomor_petunjuk" class="form-control" placeholder="Contoh: DPPPA/VII/2025">
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_paket" class="form-label">Nomor Paket</label>
                        <input type="text" name="nomor_paket" id="nomor_paket" class="form-control" placeholder="Contoh: 2025">
                    </div>
                </div>

                <!-- File Surat (PDF) -->

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection