<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bukti Pembayaran</h1>
        <p>Nomor Transaksi: {{ $pembayaran->id }}</p>
    </div>
    <div class="content">
        <p><strong>Nama Kepala Keluarga:</strong> {{ $pembayaran->keluarga->nama_kepala_keluarga }}</p>
        <p><strong>No. Kartu Keluarga:</strong> {{ $pembayaran->keluarga->no_kk }}</p>
        <p><strong>Tanggal Pembayaran:</strong> {{ $pembayaran->tanggal_pembayaran->format('d-m-Y') }}</p>
        <p><strong>Bulan yang Dibayarkan:</strong> {{ $pembayaran->bulan }}</p>
        <p><strong>Nominal Pembayaran:</strong> Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</p>
    </div>
    <div class="footer">
        <p>Terima kasih atas pembayaran Anda.</p>
        <p>____________________</p>
        <p>Tanda Tangan</p>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <a href="{{ asset('storage/' . $pembayaran->pdf_path) }}" target="_blank">Lihat Bukti Pembayaran</a>
        </div>
    @endif
</body>
</html>