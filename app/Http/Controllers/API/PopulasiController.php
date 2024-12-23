<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Populasi;
use Illuminate\Http\Request;

class PopulasiController extends Controller
{
    public function index()
    {
        $populasis = Populasi::all();
        return response()->json($populasis);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'jenis' => 'required|in:Domba,Kambing,Sapi',
            'jkel' => 'required|in:Jantan,Betina',
            'kode' => 'required|unique:populasis',
            'induk' => 'required',
            'sumber' => 'required|in:Suplier,Kelahiran',
            'asal' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $populasi = Populasi::create($validatedData);
        return response()->json($populasi, 201);
    }

    public function show($id)
    {
        $populasi = Populasi::findOrFail($id);
        return response()->json($populasi);
    }

    public function update(Request $request, $id)
    {
        $populasi = Populasi::findOrFail($id);
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'jenis' => 'required|in:Domba,Kambing,Sapi',
            'jkel' => 'required|in:Jantan,Betina',
            'kode' => 'required|unique:populasis,kode,' . $id,
            'induk' => 'required',
            'sumber' => 'required|in:Suplier,Kelahiran',
            'asal' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $populasi->update($validatedData);
        return response()->json($populasi);
    }

    public function destroy($id)
    {
        $populasi = Populasi::findOrFail($id);
        $populasi->delete();
        return response()->json(null, 204);
    }
}
