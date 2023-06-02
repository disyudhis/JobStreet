<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'namaPerusahaan',
        'email',
        'phone',
        'address',
        'image',
        'user_id'
    ];
}
