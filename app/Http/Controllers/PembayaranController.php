<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Keluarga;
use App\Models\SaldoKas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluarga = Keluarga::all();
        return view('pembayaran.create', compact('keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validated = $request->validate([
             'keluarga_id' => 'required|exists:keluarga,id',
             'tanggal_pembayaran' => 'required|date',
             'nominal' => 'required|numeric|min:0',
             'bulan' => 'required|array|min:1|max:12', // Mengizinkan input array untuk bulan
             'bulan.*' => 'required|string|max:255', // Validasi setiap item dalam array
             'bukti_pembayaran' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Opsional
         ]);
     
         $nominal_per_bulan = 50000; // Nominal per bulan
         $total_bulan = count($validated['bulan']); // Hitung jumlah bulan yang dipilih
     
         // Pastikan nominal cukup untuk jumlah bulan yang dipilih
         if ($validated['nominal'] < $nominal_per_bulan * $total_bulan) {
             return redirect()->back()->withErrors(['nominal' => 'Nominal tidak cukup untuk membayar semua bulan yang dipilih.']);
         }
     
         // Simpan pembayaran untuk setiap bulan yang dipilih
         foreach ($validated['bulan'] as $bulan) {
             // Cek apakah pembayaran untuk bulan ini sudah ada
             $existingPayment = Pembayaran::where('keluarga_id', $validated['keluarga_id'])
                                           ->where('bulan', $bulan)
                                           ->first();
     
             if (!$existingPayment) {
                 $pembayaran = Pembayaran::create([
                     'keluarga_id' => $validated['keluarga_id'],
                     'tanggal_pembayaran' => Carbon::parse($validated['tanggal_pembayaran']),
                     'nominal' => $nominal_per_bulan, // Set nominal per bulan
                     'bulan' => $bulan,
                 ]);
     
                 // Simpan bukti pembayaran jika ada
                 if ($request->hasFile('bukti_pembayaran')) {
                     $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
                     $pembayaran->bukti_pembayaran = $path; // Simpan path bukti pembayaran
                     $pembayaran->save();
                 }
             }
         }
     
         // Update Saldo Kas
         $saldo = SaldoKas::first();
         if ($saldo) {
             $saldo->saldo += $validated['nominal'];
             $saldo->save();
         } else {
             SaldoKas::create(['saldo' => $validated['nominal']]);
         }
     
         return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
     }

     public function generatePdf()
    {
        $data = ['title' => 'Bukti Pembayaran'];
        $pdf = PDF::loadView('pages.pdf', $data);
        return $pdf->stream('bukti_pembayaran.pdf');
    }
     
     /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $keluarga = Keluarga::all();
        return view('pembayaran.edit', compact('pembayaran', 'keluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'keluarga_id' => 'required|exists:keluarga,id',
            'tanggal_pembayaran' => 'required|date',
            'nominal' => 'required|numeric|min:0',
            'bulan' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Opsional
        ]);

        $pembayaran->update($validated);

        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $pembayaran->bukti_pembayaran = $path;
            $pembayaran->save();
        }

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
