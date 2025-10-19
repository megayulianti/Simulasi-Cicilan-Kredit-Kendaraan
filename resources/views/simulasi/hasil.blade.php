<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Simulasi Cicilan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
  <div class="container col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="text-center mb-4">Hasil Simulasi Cicilan Kredit</h3>
        <table class="table table-bordered">
          <tr><th>Harga OTR</th><td>Rp {{ number_format($otr, 0, ',', '.') }}</td></tr>
          <tr><th>DP ({{ $dpPercent }}%)</th><td>Rp {{ number_format($dpNominal, 0, ',', '.') }}</td></tr>
          <tr><th>Pokok Pinjaman</th><td>Rp {{ number_format($pokokPinjaman, 0, ',', '.') }}</td></tr>
          <tr><th>Tenor</th><td>{{ $tenor }} bulan</td></tr>
          <tr><th>Bunga per Tahun</th><td>{{ $bungaTahunan }}%</td></tr>
          <tr><th>Angsuran per Bulan</th><td>Rp {{ number_format($angsuranPerBulan, 0, ',', '.') }}</td></tr>
          <tr><th>Total Bunga</th><td>Rp {{ number_format($totalBunga, 0, ',', '.') }}</td></tr>
          <tr><th>Total Pembayaran</th><td>Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</td></tr>
        </table>

        <div class="text-center mt-4">
          <a href="{{ route('frontend.simulasi.index') }}" class="btn btn-secondary">🔙 Kembali</a>
          <a href="{{ route('frontend.simulasi.download', $sim->id) }}" class="btn btn-success">⬇️ Download PDF</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
