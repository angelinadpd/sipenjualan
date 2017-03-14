<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class realisasi extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword;

  protected $table = 'realisasi';
  protected $guarded = ['idrealisasi'];

  public function laporanpembelian()
    {
        return $this->belongsTo('App\laporanpembelian');
    }
}

