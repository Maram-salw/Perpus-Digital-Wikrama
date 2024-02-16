<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\peminjaman;
use App\Models\user;
use App\Models\anggota;
use App\Models\histori;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
        $peminjamans = peminjaman::all();
        $users = user::all();
        $anggotas = anggota::all();
        $historis = histori::all();
        return view('home', compact('bukus', 'peminjamans', 'users','anggotas', 'historis',));
    }
}
