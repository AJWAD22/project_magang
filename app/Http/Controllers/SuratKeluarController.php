<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Menampilkan daftar surat keluar.
     */
    public function index()
    {
        $letters = SuratKeluar::latest()->get();
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = \App\Models\ArsipSurat::count();

        return view('surat-keluar.index', compact('letters', 'suratKeluarCount', 'arsipSuratCount'));
    }

    /**
     * Menampilkan form untuk membuat surat keluar baru.
     */
    public function create()
    {
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = \App\Models\ArsipSurat::count();

        return view('surat-keluar.create', compact('suratKeluarCount', 'arsipSuratCount'));
    }

    /**
     * Menyimpan surat keluar baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:100|unique:surat_keluar,nomor_surat',
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:5120', // maks 5 MB
        ]);

        $filePath = $request->file('file')->store('surat-keluar', 'public');

        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail surat keluar (opsional).
     */
    public function show(SuratKeluar $suratKeluar)
    {
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = \App\Models\ArsipSurat::count();

        return view('surat-keluar.show', compact('suratKeluar', 'suratKeluarCount', 'arsipSuratCount'));
    }

    /**
     * Menampilkan form edit surat keluar.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = \App\Models\ArsipSurat::count();

        return view('surat-keluar.edit', compact('suratKeluar', 'suratKeluarCount', 'arsipSuratCount'));
    }

    /**
     * Memperbarui surat keluar.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:100|unique:surat_keluar,nomor_surat,' . $suratKeluar->id,
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
        ];

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($suratKeluar->file_path) {
                Storage::disk('public')->delete($suratKeluar->file_path);
            }
            $data['file_path'] = $request->file('file')->store('surat-keluar', 'public');
        }

        $suratKeluar->update($data);

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil diperbarui!');
    }

    /**
     * Menghapus surat keluar.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->file_path) {
            Storage::disk('public')->delete($suratKeluar->file_path);
        }
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil dihapus.');
    }
}