<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\str;
// Use Alert;


class PeminjamanController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        $peminjamans = Peminjaman::latest()->paginate(5);

        return view('peminjamans.index', compact('peminjamans', 'anggotas','bukus'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        $peminjamans = Peminjaman::all();
        return view('peminjamans.create', compact('bukus', 'anggotas','peminjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            ]);

        $cek = Anggota::where('nama', $request->nama)->first();
        $nomor=0;
        Peminjaman::create([
            'IUD' => 'P'.$nomor++,
            'tgl_pinjam' => Carbon::now(),
            'tgl_balik' => Carbon::parse(Carbon::now())->addDays(14)->format('Y-m-d'),
            'judul' => $request->judul,
            'nama_pet' => $request->nama_pet,
            'nama' => $request->nama,
            'no_hp' => $cek->no_hp,
        ]);
     
        return redirect()->route('peminjamans.index')->with('success', 'peminjam Berhasil Di tambahkan!');

        // return redirect()
        //     ->route('peminjamans.index')
        //     ->with('success', 'Peminjaman Berhasil Di Tambahkan.');

        return redirect()
            ->route('peminjamans.index')
            ->with('success', 'Peminjaman Berhasil Di Tambahkan.');
    }
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjamans.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        return view('peminjamans.edit', compact('peminjaman','bukus','anggotas'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'IUD' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_balik' => 'required',
            'judul' => 'required',
            'nama_pet' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
        ]);

        $cek = Anggota::where('nama', $request->nama)->first();
    
    Peminjaman::edit([
        'IUD' => $cek->IUD,
        'tgl_pinjam' => Carbon::now(),
        'tgl_balik' => Carbon::parse(Carbon::now())->addDays(14)->format('Y-m-d'),
        'judul' => $request->judul,
        'nama_pet' => $request->nama_pet,
        'nama' => $request->nama,
        'no_hp' => $cek->no_hp,
    ]);

        $peminjaman->update($request->all());

        return redirect()
            ->route('peminjamans.index')
            ->with('success', 'Peminjaman Berhasil Di Update');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjamans.index')->with('error', 'peminjam Berhasil Di hapus');
    }
}
