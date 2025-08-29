<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    /**
     * Tampilkan daftar surat keluar.
     */
    public function index()
    {
        $suratKeluars = SuratKeluar::latest()->paginate(10);
        return view('surat-keluar.index', compact('suratKeluars'));
    }

    /**
     * Tampilkan form untuk tambah surat keluar baru.
     */
    public function create()
    {
        return view('surat-keluar.create');
    }

    /**
     * Simpan surat keluar baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_sururat' => 'required|string|max:50',
            'penerima' => 'required|string|max:100',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required|string',
        ]);

        SuratKeluar::create($request->all());

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit surat keluar.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    /**
     * Update surat keluar di database.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'penerima' => 'required|string|max:100',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required|string',
        ]);

        $suratKeluar->update($request->all());

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    /**
     * Hapus surat keluar dari database.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil dihapus.');
    }
}