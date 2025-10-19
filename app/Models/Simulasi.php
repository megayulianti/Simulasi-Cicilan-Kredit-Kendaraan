<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    protected $table = 'simulasi';

    protected $fillable = [
        'otr',
        'dp_percent',
        'dp_nominal',
        'pokok_pinjaman',
        'tenor',
        'bunga_tahun',
        'angsuran_per_bulan',
        'total_bunga',
        'total_pembayaran',
        'jadwal',
    ];

    protected $casts = [
        'jadwal' => 'array',
    ];
}

