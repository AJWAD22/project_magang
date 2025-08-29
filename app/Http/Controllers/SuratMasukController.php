<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuks = SuratMasuk::latest()->paginate(10);
        return view('surat-masuk.index', compact('suratMasuks'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_masuk' => 'required|date',
            'perihal' => 'required',
        ]);

        SuratMasuk::create($request->all());

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'pengirim' => 'required',
            'tanggal_masuk' => 'required|date',
            'perihal' => 'required',
        ]);

        $suratMasuk->update($request->all());

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil diupdate.');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        $suratMasuk->delete();
        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil dihapus.');
    }
}