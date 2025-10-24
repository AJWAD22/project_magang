@extends('layouts.admin')

@section('title', 'Daftar Arsip Surat')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Arsip Surat</h4>
        <a href="{{ route('arsip-surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Arsipkan File
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($archives->isEmpty())
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <p class="mb-0">Belum ada arsip surat.</p>
            </div>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Arsip</th>
                                <th>Nama File</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archives as $arsip)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($arsip->tanggal_arsip)->format('d/m/Y') }}</td>
                                <td>
                                    @if($arsip->file_path)
                                        {{ basename($arsip->file_path) }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>{{ $arsip->catatan ?? '—' }}</td>
                                <td>
                                    @if($arsip->file_path)
                                        <a href="{{ asset('storage/' . $arsip->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ asset('storage/' . $arsip->file_path) }}" download class="btn btn-sm btn-outline-success" title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @endif

                                    <form action="{{ route('arsip-surat.destroy', $arsip) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus arsip ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $archives->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection