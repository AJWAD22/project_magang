@extends('layouts.admin')

@section('title', 'Daftar Arsip Surat')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Arsip Surat</h4>
        <a href="{{ route('arsip-surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Arsipkan Surat
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
                                <th>Nomor Surat</th>
                                <th>Tujuan</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archives as $arsip)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($arsip->suratKeluar)
                                        {{ $arsip->suratKeluar->nomor_surat }}
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if($arsip->suratKeluar)
                                        {{ $arsip->suratKeluar->tujuan }}
                                    @else
                                        <span class="text-muted">Surat tidak ditemukan</span>
                                    @endif
                                </td>
                                <td>{{ $arsip->kategori }}</td>
                                <td>
                                    @if($arsip->suratKeluar && $arsip->suratKeluar->file_path)
                                        <a href="{{ route('arsip-surat.download', $arsip) }}" class="btn btn-sm btn-outline-primary" title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif

                                    <form action="{{ route('arsip-surat.destroy', $arsip) }}" method="POST" style="display: inline;" title="Hapus">
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

                <!-- Pagination (opsional) -->
                <div class="mt-3">
                    {{ $archives->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection