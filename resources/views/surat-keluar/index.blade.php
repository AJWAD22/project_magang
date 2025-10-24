@extends('layouts.admin')

@section('title', 'Daftar Surat Keluar')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Surat Keluar</h4>
        <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Surat
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($letters->isEmpty())
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <p class="mb-0">Belum ada surat keluar.</p>
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
                                <th>Alamat Penerima</th>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Nomor Petunjuk</th>
                                <th>Nomor Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($letters as $letter)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $letter->nomor_unit }} / {{ $letter->nomor_berkas }}</td>
                                <td>{{ $letter->alamat_penerima }}</td>
                                <td>{{ \Carbon\Carbon::parse($letter->tanggal_surat)->format('d/m/Y') }}</td>
                                <td>{{ $letter->perihal }}</td>
                                <td>{{ $letter->nomor_petunjuk ?? '—' }}</td>
                                <td>{{ $letter->nomor_paket ?? '—' }}</td>
                                <td>
                                    <a href="{{ route('surat-keluar.edit', $letter) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('surat-keluar.destroy', $letter) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus surat ini?')">
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
                    {{ $letters->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection