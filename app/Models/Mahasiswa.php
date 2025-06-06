<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Matakuliah;
use App\Models\Prodi;

class Mahasiswa extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'prodi_id',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_nim', 'matakuliah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}