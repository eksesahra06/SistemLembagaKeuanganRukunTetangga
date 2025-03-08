<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $keluarga = Keluarga::where('nama_kepala_keluarga', 'LIKE', "%{$search}%")
                                 ->orWhere('no_kk', 'LIKE', "%{$search}%")
                                 ->orWhere('nik', 'LIKE', "%{$search}%")
                                 ->orWhere('alamat', 'LIKE', "%{$search}%")
                                 ->paginate(10);
        } else {
            $keluarga = Keluarga::paginate(10);
        }

        return view('keluarga.index', compact('keluarga', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluarga = Keluarga::all();
        // dd($keluarga);
        return view('keluarga.create', compact('keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|unique:keluarga',
            'nama_kepala_keluarga' => 'required',
            'nik' => 'required|unique:keluarga',
            'alamat' => 'required',
        ]);

        Keluarga::create($validated);
        return redirect()->route('keluarga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluarga $keluarga)
    {
        return view('keluarga.show', compact('keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluarga $keluarga)
    {
        return view('keluarga.edit', compact('keluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $validated = $request->validate([
            'no_kk' => 'required|unique:keluarga,no_kk,' . $keluarga->id,
            'nama_kepala_keluarga' => 'required',
            'nik' => 'required|unique:keluarga,nik,' . $keluarga->id,
            'alamat' => 'required',
        ]);

        $keluarga->update($validated);
        return redirect()->route('keluarga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();
        return redirect()->route('keluarga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
