<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    public function allData() {
        return DB::table('blood_stocks')->get();
    }
    use HasFactory, Notifiable;

    protected $table = 'blood_stocks';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'gol_darah',
        'jenis',
        'jumlah',
    ];

    protected $hidden = [
        'jumlah',
    ];

    public static function getBloodStocks()
    {
        return self::paginate(); // Menggunakan paginasi dengan 10 item per halaman
    }
}
