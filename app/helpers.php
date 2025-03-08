<!-- if (! function_exists('get_saldo_kas')) {
    function get_saldo_kas()
    {
        return SaldoKas::first() ?? new SaldoKas(['saldo' => 0]);
    }
}

if (! function_exists('get_total_pengeluaran')) {
    function get_total_pengeluaran()
    {
        return Pengeluaran::sum('nominal') ?? 0;
    }
} -->