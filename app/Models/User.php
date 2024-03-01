<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles; //tambah ini, perintah pertama bu delika
use Tymon\JWTAuth\Contracts\JWTSubject; // <-- import JWTSubject

class User extends Authenticatable implements JWTSubject  //<-- tambah ini
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles; //tambah hasrole, perintah kedua bu delika

    protected $guard_name = 'api'; //tambah ini, perintah ketiga bu delika

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //method ini dibuat untuk mendapatkan list permission
    //berdasarkan user yang sedang login 
    //author : aeni6746@gmail.com 
    
    public function getPermissionArray(){
        return $this->getAllPermissions()->mapWithKeys(function($pr){
            return [$pr['name'] => true];
        });
    }

    /**
     * getJWTIdentifier
     * 
     * @return void
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * getJWTCustomClaims
     * 
     * @return void
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
