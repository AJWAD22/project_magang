@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Surat Keluar</h4>
    <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('surat-keluar.update', $suratKeluar) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $suratKeluar->tanggal) }}" required>
        </div>
        <div class="mb-3">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control" value="{{ old('perihal', $suratKeluar->perihal) }}" required>
        </div>
        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control" value="{{ old('tujuan', $suratKeluar->tujuan) }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan', $suratKeluar->keterangan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection