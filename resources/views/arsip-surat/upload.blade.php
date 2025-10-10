@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>📤 Upload Arsip Surat</h3>
    <form action="{{ route('arsip-surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul Arsip</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>File (PDF/DOCX)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori (Opsional)</label>
            <input type="text" name="kategori" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi (Opsional)</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection