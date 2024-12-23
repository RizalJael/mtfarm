<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('supliers.index', compact('supliers'));
    }

    public function create()
    {
        return view('supliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_telp' => 'nullable',
            'catatan' => 'nullable',
        ]);

        Suplier::create($request->all());
        return redirect()->route('supliers.index')->with('success', 'Supplier added successfully');
    }

    public function show(Suplier $suplier)
    {
        return view('supliers.show', compact('suplier'));
    }

    public function edit(Suplier $suplier)
    {
        return view('supliers.edit', compact('suplier'));
    }

    public function update(Request $request, Suplier $suplier)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'no_telp' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $suplier->update($request->all());
        return redirect()->route('supliers.index')->with('success', 'Supplier updated successfully');
    }

    public function destroy(Suplier $suplier)
    {
        $suplier->delete();
        return redirect()->route('supliers.index')->with('success', 'Supplier deleted successfully');
    }
}
