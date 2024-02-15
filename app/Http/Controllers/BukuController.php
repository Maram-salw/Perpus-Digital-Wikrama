<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);

        return view('bukus.index', compact('bukus'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            
            ]);

        $cek = Buku::where('judul', $request->judul)->first();
        $min = 1;
        $max = 1000;
        Buku::create([
            'IUD' => 'Buku'. random_int($min, $max),
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
        ]);
     
        return redirect()->route('bukus.index')->with('success', 'Buku Berhasil Di Tambahkan');
    }
    public function show(Buku $buku)
    {
        return view('bukus.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('bukus.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
        
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
        ]);

        $buku->update($request->all());

        return redirect()->route('bukus.index')->with('warning', 'Buku Berhasil Di Ubah');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();return redirect()->route('bukus.index')->with('error', 'buku Berhasil Di hapus');
    }
}

