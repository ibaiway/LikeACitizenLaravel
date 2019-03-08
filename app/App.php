<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
  public function citys()
  {
      return $this->belongsToMany('App\City');
  }
  public function categorys()
      {
          return $this->belongsToMany('App\Category');
      }
}
