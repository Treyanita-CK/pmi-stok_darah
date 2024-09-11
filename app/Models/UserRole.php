<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';
    protected $fillable = ['name'];

    // override method boot() menangani event creating
    public static function boot()
    {
        parent::boot();
    
        static::creating(function($user) {
        // berikan peran default admin kepada pengguna baru
        $defaultRole = 'user';
        $userRole = UserRole::where('role_name', $defaultRole)->first();
                if($userRole) {
                    $user->role_id = $userRole->id;
                }
            });
    }

     // Relasi antara tabel user_roles dan user
     public function user()
     {
         return $this->hasMany(User::class, 'role_id');
     }
}
