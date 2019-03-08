<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public function citys()
  {
      return $this->hasMany('App\City');
  }
}
