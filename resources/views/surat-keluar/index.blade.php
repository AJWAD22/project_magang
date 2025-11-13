@extends('layouts.admin')

@section('title', 'Daftar Surat Keluar')

@push('styles')
<style>
    /* Layout form yang lega */
    .modal-body .form-label {
        font-weight: 600;
        color: #4b5563;
        margin-bottom: 8px;
        display: block;
    }

    .modal-body .form-control {
        padding: 12px 15px;
        margin-bottom: 18px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        transition: border-color 0.2s ease;
    }

    .modal-body .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .modal-body input[type="date"] {
        padding: 12px 15px;
        margin-bottom: 18px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
    }

    .modal-footer .btn {
        padding: 10px 20px;
        font-size: 15px;
        border-radius: 8px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Surat Keluar</h4>
        <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Surat
        </a>
    </div>

    @if(session('success'))
    <div id="success-alert" class="alert alert-success d-flex align-items-center justify-content-between py-2 px-3 mb-3" 
         style="background-color: #d4edda; border: none; border-radius: 6px; font-size: 0.9rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close" style="font-size: 0.8rem;"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    if (alert && alert.parentNode) {
                        alert.remove();
                    }
                }, 3000);
            }
        });
    </script>
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
                                <th>Nomor Berkas</th>
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
                                <td>{{ $letter->nomor_berkas }}</td>
                                <td>{{ $letter->alamat_penerima }}</td>
                                <td>{{ \Carbon\Carbon::parse($letter->tanggal_surat)->format('d/m/Y') }}</td>
                                <td>{{ $letter->perihal }}</td>
                                <td>{{ $letter->nomor_petunjuk ?? '—' }}</td>
                                <td>{{ $letter->nomor_paket ?? '—' }}</td>
                                <td>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-primary" 
                                            title="Edit"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal" 
                                            data-letter-id="{{ $letter->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
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

                <div class="mt-3">
                    {{ $letters->links() }}
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Surat Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label for="nomor_berkas" class="form-label">Nomor Berkas</label>
                        <input type="text" name="nomor_berkas" id="nomor_berkas" class="form-control" required>
                        <div class="invalid-feedback" id="error_nomor_berkas"></div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                        <input type="text" name="alamat_penerima" id="alamat_penerima" class="form-control" required>
                        <div class="invalid-feedback" id="error_alamat_penerima"></div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" required>
                        <div class="invalid-feedback" id="error_tanggal_surat"></div>
                    </div>

                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" name="perihal" id="perihal" class="form-control" required>
                        <div class="invalid-feedback" id="error_perihal"></div>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_petunjuk" class="form-label">Nomor Petunjuk</label>
                        <input type="text" name="nomor_petunjuk" id="nomor_petunjuk" class="form-control">
                        <div class="invalid-feedback" id="error_nomor_petunjuk"></div>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_paket" class="form-label">Nomor Paket</label>
                        <input type="text" name="nomor_paket" id="nomor_paket" class="form-control">
                        <div class="invalid-feedback" id="error_nomor_paket"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');

    editModal.addEventListener('hidden.bs.modal', function () {
        clearErrors();
    });

    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const letterId = button.getAttribute('data-letter-id');

        editForm.reset();
        clearErrors();

        fetch(`/surat-keluar/${letterId}/edit`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Gagal memuat data');
            return response.json();
        })
        .then(data => {
            document.getElementById('edit_id').value = data.id;
            document.getElementById('nomor_berkas').value = data.nomor_berkas || '';
            document.getElementById('alamat_penerima').value = data.alamat_penerima || '';
            document.getElementById('tanggal_surat').value = data.tanggal_surat || '';
            document.getElementById('perihal').value = data.perihal || '';
            document.getElementById('nomor_petunjuk').value = data.nomor_petunjuk || '';
            document.getElementById('nomor_paket').value = data.nomor_paket || '';
        })
        .catch(error => {
            alert('Gagal memuat data surat.');
            bootstrap.Modal.getInstance(editModal).hide();
        });
    });

    editForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(editForm);
        formData.append('_method', 'PUT');
        const letterId = document.getElementById('edit_id').value;

        fetch(`/surat-keluar/${letterId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                clearErrors();
                for (const [field, messages] of Object.entries(data.errors)) {
                    const el = document.getElementById(`error_${field}`);
                    if (el) {
                        el.textContent = messages[0];
                        el.closest('.mb-3').querySelector('.form-control').classList.add('is-invalid');
                    }
                }
            } else if (data.success) {
                bootstrap.Modal.getInstance(editModal).hide();

                const row = document.querySelector(`button[data-letter-id="${letterId}"]`).closest('tr');
                if (row) {
                    row.cells[1].textContent = data.letter.nomor_berkas;
                    row.cells[2].textContent = data.letter.alamat_penerima;
                    row.cells[3].textContent = data.letter.tanggal_surat;
                    row.cells[4].textContent = data.letter.perihal;
                    row.cells[5].textContent = data.letter.nomor_petunjuk || '—';
                    row.cells[6].textContent = data.letter.nomor_paket || '—';
                }

                // Tampilkan notifikasi sukses
                const notif = document.createElement('div');
                notif.className = 'alert alert-success position-fixed';
                notif.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px; font-size: 0.9rem;';
                notif.innerHTML = `${data.message} <button type="button" class="btn-close btn-sm float-end" data-bs-dismiss="alert"></button>`;
                document.body.appendChild(notif);
                setTimeout(() => notif.remove(), 3000);
            }
        })
        .catch(() => {
            alert('Terjadi kesalahan saat menyimpan data.');
        });
    });

    function clearErrors() {
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
    }
});
</script>
@endpush
@endsection