<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public function countrys()
  {
      return $this->belongsToMany('App\Country');
  }

}
