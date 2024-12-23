<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mortal;
use App\Models\Populasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MortalController extends Controller
{
    public function index()
    {
        $mortals = Mortal::with('populasi')->latest()->get();
        return response()->json($mortals);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'penyebab' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $mortal = Mortal::create($validatedData);

            // Update status populasi
            $populasi = Populasi::where('kode', $request->kode)->first();
            $populasi->update(['status' => 'Tidak Aktif']);

            DB::commit();
            return response()->json($mortal, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    public function show($id)
    {
        $mortal = Mortal::with('populasi')->findOrFail($id);
        return response()->json($mortal);
    }

    public function update(Request $request, $id)
    {
        $mortal = Mortal::findOrFail($id);
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'penyebab' => 'nullable|string',
        ]);

        $mortal->update($validatedData);
        return response()->json($mortal);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $mortal = Mortal::findOrFail($id);

            // Mengembalikan status populasi menjadi Aktif
            $mortal->populasi->update(['status' => 'Aktif']);

            $mortal->delete();

            DB::commit();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
