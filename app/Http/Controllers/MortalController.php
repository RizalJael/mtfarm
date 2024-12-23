<?php

namespace App\Http\Controllers;

use App\Models\Mortal;
use App\Models\Populasi;
use Illuminate\Http\Request;

class MortalController extends Controller
{
    public function index()
    {
        $mortals = Mortal::with('populasi')->latest()->paginate(10);
        return view('mortals.index', compact('mortals'));
    }

    public function create()
    {
        $populasis = Populasi::where('status', 'Aktif')->get();
        return view('mortals.create', compact('populasis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'penyebab' => 'required|string',
        ]);

        $mortal = Mortal::create($validatedData);

        // Update status populasi
        $populasi = Populasi::where('kode', $request->kode)->first();
        $populasi->update(['status' => 'Tidak Aktif']);

        return redirect()->route('mortals.index')->with('success', 'Data kematian berhasil dicatat.');
    }

    public function show(Mortal $mortal)
    {
        return view('mortals.show', compact('mortal'));
    }

    public function edit(Mortal $mortal)
    {
        $populasis = Populasi::all();
        return view('mortals.edit', compact('mortal', 'populasis'));
    }

    public function update(Request $request, Mortal $mortal)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'penyebab' => 'nullable|string',
        ]);

        $mortal->update($validatedData);

        return redirect()->route('mortals.index')->with('success', 'Data kematian berhasil diperbarui.');
    }

    public function destroy(Mortal $mortal)
    {
        // Mengembalikan status populasi menjadi Aktif
        $mortal->populasi->update(['status' => 'Aktif']);

        $mortal->delete();

        return redirect()->route('mortals.index')->with('success', 'Data kematian berhasil dihapus.');
    }
}
