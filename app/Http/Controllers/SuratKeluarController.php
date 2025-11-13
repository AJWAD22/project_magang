<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
        // Cek apakah client minta JSON
        if (request()->wantsJson()) {
            return response()->json($suratKeluar);
        }
    
        // Jika tidak, tampilkan view
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = \App\Models\ArsipSurat::count();
        return view('surat-keluar.edit', compact('suratKeluar', 'suratKeluarCount', 'arsipSuratCount'));
    }

    /**
     * Memperbarui surat keluar.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $validated = $request->validate([
            'nomor_berkas' => 'required|string|max:50',
            'alamat_penerima' => 'required|string',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'nomor_petunjuk' => 'nullable|string|max:50',
            'nomor_paket' => 'nullable|string|max:50',
        ]);
    
        $suratKeluar->update($validated);
    
        // Gunakan wantsJson() agar konsisten dengan edit()
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil diperbarui.',
                'letter' => [
                    'nomor_berkas' => $suratKeluar->nomor_berkas,
                    'alamat_penerima' => $suratKeluar->alamat_penerima,
                    'tanggal_surat' => \Carbon\Carbon::parse($suratKeluar->tanggal_surat)->format('d/m/Y'),
                    'perihal' => $suratKeluar->perihal,
                    'nomor_petunjuk' => $suratKeluar->nomor_petunjuk ?? '—',
                    'nomor_paket' => $suratKeluar->nomor_paket ?? '—',
                ]
            ]);
        }
    
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