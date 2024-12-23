<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return response()->json($supliers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:supliers',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'catatan' => 'nullable|string',
        ]);

        $suplier = Suplier::create($validatedData);
        return response()->json($suplier, 201);
    }

    public function show($id)
    {
        $suplier = Suplier::findOrFail($id);
        return response()->json($suplier);
    }

    public function update(Request $request, $id)
    {
        $suplier = Suplier::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:supliers,nama,' . $id,
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'catatan' => 'nullable|string',
        ]);

        $suplier->update($validatedData);
        return response()->json($suplier);
    }

    public function destroy($id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->delete();
        return response()->json(null, 204);
    }
}
