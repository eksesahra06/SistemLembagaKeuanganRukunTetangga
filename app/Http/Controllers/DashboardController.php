<?php

namespace App\Http\Controllers;

use App\Models\SaldoKas;
use App\Models\Pengeluaran;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKas = SaldoKas::first()?->saldo ?: 0;
        $totalPengeluaran = Pengeluaran::sum('nominal');

        return view('dashboard', compact('totalKas', 'totalPengeluaran'));
    }
}
