<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class laporanpembelian extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword;

  protected $table = 'laporanpembelian';
  protected $guarded = ['idlaporanpembelian'];
  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

   public function pesanbarang()
    {
        return $this->hasMany('App\pesanbarang');
    }
     public function realisasi()
    {
        return $this->hasMany('App\realisasi');
    }
     public function barang()
    {
        return $this->hasMany('App\barang');
    }
}


