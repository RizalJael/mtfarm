<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Potong;
use App\Models\Populasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PotongController extends Controller
{
    public function index()
    {
        $potongs = Potong::with('populasi')->latest()->get();
        return response()->json($potongs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'bobot' => 'required|integer',
            'tujuan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $potong = Potong::create($validatedData);

            // Update status populasi
            $populasi = Populasi::where('kode', $request->kode)->first();
            $populasi->update(['status' => 'Tidak Aktif']);

            DB::commit();
            return response()->json($potong, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    public function show($id)
    {
        $potong = Potong::with('populasi')->findOrFail($id);
        return response()->json($potong);
    }

    public function update(Request $request, $id)
    {
        $potong = Potong::findOrFail($id);
        $validatedData = $request->validate([
            'tgl' => 'required|date',
            'kode' => 'required|exists:populasis,kode',
            'bobot' => 'required|integer',
            'tujuan' => 'nullable|string',
        ]);

        $potong->update($validatedData);
        return response()->json($potong);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $potong = Potong::findOrFail($id);

            // Mengembalikan status populasi menjadi Aktif
            $potong->populasi->update(['status' => 'Aktif']);

            $potong->delete();

            DB::commit();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
