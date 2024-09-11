<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory;
    protected $fillable = [
        'time', 
        'date', 
        'location',
        'description'
        // tambahkan field lainnya yang diperlukan
    ];
}
