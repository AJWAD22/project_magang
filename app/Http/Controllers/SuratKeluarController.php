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
        $letters = SuratKeluar::latest()->paginate(15); // 15 data per halaman
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
            'nomor_unit' => 'required|string|max:50',
            'nomor_berkas' => 'required|string|max:50',
            'alamat_penerima' => 'required|string',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'nomor_petunjuk' => 'nullable|string|max:50',
            'nomor_paket' => 'nullable|string|max:50',
        ]);
    
    
        SuratKeluar::create([
            'nomor_unit' => $request->nomor_unit,
            'nomor_berkas' => $request->nomor_berkas,
            'alamat_penerima' => $request->alamat_penerima,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'nomor_petunjuk' => $request->nomor_petunjuk,
            'nomor_paket' => $request->nomor_paket,
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