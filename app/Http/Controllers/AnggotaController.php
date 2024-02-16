<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
Use Alert;


class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->paginate(5);

        return view('anggotas.index', compact('anggotas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('anggotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'IUD' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Anggota::create($request->all());
        return redirect()->route('anggotas.index')->with('succes', 'Anggota Berhasil Di Tambahkan');
    }
    public function show(Anggota $anggota)
    {
        return view('anggotas.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('anggotas.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([

            'IUD' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()
            ->route('anggotas.index')
            ->with('success', 'Anggota Berhasil Di Update');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('bukus.index')->with('error', 'Anggota Berhasil Di Hapus');
           
    }
}

// ->route('bukus.index')
// ->with('success', 'buku deleted successfully');