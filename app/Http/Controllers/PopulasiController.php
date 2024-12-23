<?php

namespace App\Http\Controllers;

use App\Models\Populasi;
use App\Models\Suplier;
use Illuminate\Http\Request;

class PopulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $populasis = Populasi::with('suplier')->latest()->paginate(10);
        return view('populasis.index', compact('populasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supliers = Suplier::all();
        return view('populasis.create', compact('supliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'jenis' => 'required|string',
            'jkel' => 'required|string',
            'kode' => 'required|string|unique:populasis',
            'induk' => 'required|string',
            'sumber' => 'required|string',
            'asal' => 'required|exists:supliers,nama',
            'keterangan' => 'nullable|string',
            'status' => 'required|string',
        ]);

        Populasi::create($validatedData);

        return redirect()->route('populasis.index')
            ->with('success', 'Data populasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Populasi $populasi)
    {
        return view('populasis.show', compact('populasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Populasi $populasi)
    {
        $supliers = Suplier::all();
        return view('populasis.edit', compact('populasi', 'supliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Populasi $populasi)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'jenis' => 'required|string',
            'jkel' => 'required|string',
            'kode' => 'required|string|unique:populasis,kode,' . $populasi->id,
            'induk' => 'required|string',
            'sumber' => 'required|string',
            'asal' => 'required|exists:supliers,nama',
            'keterangan' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $populasi->update($validatedData);

        return redirect()->route('populasis.index')
            ->with('success', 'Data populasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Populasi $populasi)
    {
        $populasi->delete();

        return redirect()->route('populasis.index')
            ->with('success', 'Data populasi berhasil dihapus.');
    }
}
