<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $name = "Ultraman Cosmos"; // bisa data dummy dulu
        return view('home', compact('name'));
    }
}
