<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\SaldoKas;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        // $saldo_kas = SaldoKas::firstOr(function () {
        //     return new SaldoKas(['saldo' => 0]);
        // });

        return view('pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluarga = Keluarga::all();
        return view('pengeluaran.create', compact('keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tujuan' => 'required|string|max:255',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::create($validated);

        // Update Saldo Kas
        $saldo = SaldoKas::first();
        if ($saldo) {
            $saldo->saldo -= $validated['nominal'];
            $saldo->save();
        } else {
            SaldoKas::create(['saldo' => -$validated['nominal']]);
        }

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran', 'keluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'nominal' => 'required|numeric|min:0',
            'tujuan' => 'required|string|max:255',
            'bukti_pengeluaran' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Opsional
        ]);

        $pengeluaran->update($validated);

        if ($request->hasFile('bukti_pengeluaran')) {
            $path = $request->file('bukti_pengeluaran')->store('bukti_pengeluaran', 'public');
            $pengeluaran->bukti_pengeluaran = $path;
            $pengeluaran->save();
        }

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
