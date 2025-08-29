<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::count();
        $suratKeluar = SuratKeluar::count();
        $pengguna = User::count();

        return view('dashboard', compact('suratMasuk', 'suratKeluar', 'pengguna'));
    }
}