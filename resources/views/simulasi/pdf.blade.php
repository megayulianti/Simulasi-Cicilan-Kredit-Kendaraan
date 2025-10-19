<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Simulasi Cicilan Kredit</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 30px;
        }
        h2, h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
        }
        td:first-child, th:first-child {
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Laporan Simulasi Cicilan Kredit</h2>
    <hr>

    <table>
        <tr>
            <th>Harga OTR</th>
            <td>Rp {{ number_format($sim->otr, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>DP ({{ $sim->dp_percent }}%)</th>
            <td>Rp {{ number_format($sim->dp_nominal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Pokok Pinjaman</th>
            <td>Rp {{ number_format($sim->pokok_pinjaman, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tenor</th>
            <td>{{ $sim->tenor }} bulan</td>
        </tr>
        <tr>
            <th>Bunga per Tahun</th>
            <td>{{ $sim->bunga_tahun }}%</td>
        </tr>
        <tr>
            <th>Angsuran per Bulan</th>
            <td>Rp {{ number_format($sim->angsuran_per_bulan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Bunga</th>
            <td>Rp {{ number_format($sim->total_bunga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Pembayaran</th>
            <td>Rp {{ number_format($sim->total_pembayaran, 0, ',', '.') }}</td>
        </tr>
    </table>

    <br>
    <h3>Rincian Jadwal Cicilan (Simulasi)</h3>

    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Pokok</th>
                <th>Bunga</th>
                <th>Total Angsuran</th>
                <th>Sisa Pinjaman</th>
            </tr>
        </thead>
        <tbody>
            @php
                $pokok = $sim->pokok_pinjaman;
                $bungaPerBulan = ($sim->bunga_tahun / 12) / 100;
                $angsuranPerBulan = $sim->angsuran_per_bulan;
            @endphp

            @for($i = 1; $i <= $sim->tenor; $i++)
                @php
                    $bunga = $pokok * $bungaPerBulan;
                    $angsuranPokok = $angsuranPerBulan - $bunga;
                    $pokok -= $angsuranPokok;
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>Rp {{ number_format($angsuranPokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($bunga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($angsuranPerBulan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format(max($pokok, 0), 0, ',', '.') }}</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <p class="footer">
        Dicetak pada: {{ date('d-m-Y H:i') }}<br>
        Sistem Simulasi Kredit © {{ date('Y') }}
    </p>
</body>
</html>
