<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
public $table = "countries";
  public function citys()
  {
      return $this->hasMany('App\City');
  }
  public function languages()
  {
      return $this->belongsToMany('App\Language');
  }
}
