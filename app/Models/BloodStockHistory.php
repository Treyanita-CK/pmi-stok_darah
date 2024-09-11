<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStockHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'blood_stock_histories';

    protected $fillable = [
        'blood_stock_id',
        'gol_darah',
        'jenis',
        'jumlah',
        'updated_at',
    ];

    public function bloodStock()
    {
        return $this->belongsTo(BloodStock::class);
    }
}
