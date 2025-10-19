<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Cicilan Kredit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
<div class="container col-md-6">
    <div class="card shadow-lg">
        <div class="card-body">
            <h3 class="text-center mb-4">Simulasi Cicilan Kredit</h3>
            <form action="{{ route('frontend.simulasi.hitung') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Harga OTR (Rp)</label>
                    <input type="number" name="otr" class="form-control" placeholder="240000000" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">DP (%)</label>
                    <input type="number" name="dp_percent" class="form-control" placeholder="20" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lama Cicilan (bulan)</label>
                    <input type="number" name="tenor" class="form-control" placeholder="18" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bunga per Tahun (%)</label>
                    <input type="number" name="bunga" step="0.01" class="form-control" placeholder="6.5" required>
                </div>
                <button class="btn btn-primary w-100">Hitung Cicilan</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
