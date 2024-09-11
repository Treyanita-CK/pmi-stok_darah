<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Sanctum;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relasi antara tabel users dan user_roles
    public function isAdmin()
    {
        return $this->role_id === 1;
         //return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}
