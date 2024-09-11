<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'ketersediaan',
        'bb',
        'gol_darah',
        'donor_ke',
    ];
}
