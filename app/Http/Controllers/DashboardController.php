<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\ArsipSurat;

class DashboardController extends Controller
{
    public function index()
    {
        $suratKeluarCount = SuratKeluar::count();
        $arsipSuratCount = ArsipSurat::count();
    
        return view('dashboard.index', compact('suratKeluarCount', 'arsipSuratCount'))
               ->with('title', 'Dashboard');
    }
}