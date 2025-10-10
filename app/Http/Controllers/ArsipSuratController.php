<?php

namespace App\Http\Controllers;

use App\Models\ArsipSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    public function index()
    {
        $archives = ArsipSurat::with('suratKeluar')->latest()->get();
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = ArsipSurat::count(); // 🔥 Nama sesuai layout

        return view('arsip-surat.index', compact('archives', 'suratKeluarCount', 'arsipSuratCount'));
    }

    public function create()
    {
        $letters = SuratKeluar::whereDoesntHave('arsipSurat')->get();
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = ArsipSurat::count(); // 🔥 Sesuai layout

        return view('arsip-surat.create', compact('letters', 'suratKeluarCount', 'arsipSuratCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'surat_keluar_id' => 'required|exists:App\Models\SuratKeluar,id', // ✅ Aman & konsisten
            'kategori' => 'required|string|max:100',
            'catatan' => 'nullable|string',
        ]);

        ArsipSurat::create($request->only(['surat_keluar_id', 'kategori', 'catatan']));

        return redirect()->route('arsip-surat.index')
                         ->with('success', 'Surat berhasil diarsipkan!');
    }

    public function show(ArsipSurat $arsipSurat)
    {
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = ArsipSurat::count();
        return view('arsip-surat.show', compact('arsipSurat', 'suratKeluarCount', 'arsipSuratCount'));
    }

    public function edit(ArsipSurat $arsipSurat)
    {
        $letters = SuratKeluar::all();
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = ArsipSurat::count(); // 🔥 Sesuai layout

        return view('arsip-surat.edit', compact('arsipSurat', 'letters', 'suratKeluarCount', 'arsipSuratCount'));
    }

    public function update(Request $request, ArsipSurat $arsipSurat)
    {
        $request->validate([
            'surat_keluar_id' => 'required|exists:App\Models\SuratKeluar,id', // ✅ Konsisten
            'kategori' => 'required|string|max:100',
            'catatan' => 'nullable|string',
        ]);

        $arsipSurat->update($request->only(['surat_keluar_id', 'kategori', 'catatan']));

        return redirect()->route('arsip-surat.index')
                         ->with('success', 'Arsip berhasil diperbarui!');
    }

    public function destroy(ArsipSurat $arsipSurat)
    {
        $arsipSurat->delete();

        return redirect()->route('arsip-surat.index')
                         ->with('success', 'Arsip berhasil dihapus!');
    }

    public function download(ArsipSurat $arsipSurat)
    {
        if (!$arsipSurat->suratKeluar || !$arsipSurat->suratKeluar->file_path) {
            abort(404, 'File surat tidak ditemukan.');
        }

        $filePath = storage_path('app/public/' . $arsipSurat->suratKeluar->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan di server.');
        }

        $fileName = 'Surat_' . $arsipSurat->suratKeluar->nomor_surat . '.pdf';

        return response()->download($filePath, $fileName);
    }
}