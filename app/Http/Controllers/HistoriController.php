<?php

namespace App\Http\Controllers;

use App\Models\histori;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class historiController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        $historis = Peminjaman::latest()->paginate(5);

        return view('historis.index', compact('historis', 'anggotas','bukus'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        return view('historis.create', compact('bukus', 'anggotas'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'IUD' => 'required',
        //     'tgl_pinjam' => Carbon::now(),
        //     'tgl_balik' => 'required',
        //     'judul' => 'required',
        //     'nama_pet' => 'required',
        //     'nama' => 'required',
        //     'no_hp' => 'required',
        // ]);

        Histori::create([
            'IUD' => $request->IUD,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'nama_pet' => $request->nama_pet,
            'no_hp' => 'required',
            'tgl_pinjam' => Carbon::now(),
            'tgl_balik' => $request->tgl_balik,
            'judul' => $request->judul,
        ]);
        return redirect()
            ->route('historis.index')
            ->with('success', 'histori created successfully.');

        return redirect()
            ->route('historis.index')
            ->with('success', 'histori created successfully.');
    }
    public function show(Histori $histori)
    {
        return view('historis.show', compact('histori'));
    }

    public function edit(Histori $histori)
    {
        return view('historis.edit', compact('histori'));
    }

    public function update(Request $request, Histori $histori)
    {
        $request->validate([
        ]);

            $cek = Buku::where('judul', $request->judul)->first();
            $min = 1;
             $max = 1000;
             Histori::create([
            'IUD' => 'required'. random_int($min, $max),
            'judul' => 'required',
            'nama' => 'required',
            'nama_pet' => 'required',
            'no_hp' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_balik' => 'required',
        ]);

        $histori->update($request->all());

        return redirect()->route('histori$historis.index')->with('success', 'histori$histori Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->delete();

        return redirect()->route('historis.index')->with('error', 'Anggota Berhasil Di Hapus');
    }
}
