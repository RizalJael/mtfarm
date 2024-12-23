<?php

namespace App\Http\Controllers;

use App\Models\Potong;
use App\Models\Populasi;
use Illuminate\Http\Request;

class PotongController extends Controller
{
    public function index()
    {
        $potongs = Potong::with('populasi')->latest()->paginate(10);
        return view('potongs.index', compact('potongs'));
    }

    public function create()
    {
        $populasis = Populasi::where('status', 'Aktif')->get();
        return view('potongs.create', compact('populasis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'bobot' => 'required|integer|min:1',
            'tujuan' => 'nullable|string',
        ]);

        $potong = Potong::create($validatedData);

        // Update status populasi
        $populasi = Populasi::where('kode', $request->kode)->first();
        $populasi->update(['status' => 'Tidak Aktif']);

        return redirect()->route('potongs.index')->with('success', 'Data pemotongan berhasil dicatat.');
    }

    public function show(Potong $potong)
    {
        return view('potongs.show', compact('potong'));
    }

    public function edit(Potong $potong)
    {
        $populasis = Populasi::all();
        return view('potongs.edit', compact('potong', 'populasis'));
    }

    public function update(Request $request, Potong $potong)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'bobot' => 'required|integer|min:1',
            'tujuan' => 'nullable|string',
        ]);

        $potong->update($validatedData);

        return redirect()->route('potongs.index')->with('success', 'Data pemotongan berhasil diperbarui.');
    }

    public function destroy(Potong $potong)
    {
        // Mengembalikan status populasi menjadi Aktif
        $potong->populasi->update(['status' => 'Aktif']);

        $potong->delete();

        return redirect()->route('potongs.index')->with('success', 'Data pemotongan berhasil dihapus.');
    }
}
