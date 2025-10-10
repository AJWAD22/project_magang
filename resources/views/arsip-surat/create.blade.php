@extends('layouts.admin')

@section('title', 'Arsipkan Surat Keluar')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Arsipkan Surat Keluar</h4>
        <a href="{{ route('arsip-surat.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('arsip-surat.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="surat_keluar_id" class="form-label">Pilih Surat Keluar</label>
                    <select name="surat_keluar_id" id="surat_keluar_id" class="form-select" required>
                        <option value="">-- Pilih Surat --</option>
                        @foreach($letters as $letter)
                            <option value="{{ $letter->id }}">
                                {{ $letter->nomor_surat }} — {{ $letter->tujuan }} ({{ $letter->created_at->format('d/m/Y') }})
                            </option>
                        @endforeach
                    </select>
                    @error('surat_keluar_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori Arsip</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" required>
                    @error('kategori')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan (Opsional)</label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Arsipkan
                    </button>
                    <a href="{{ route('arsip-surat.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection