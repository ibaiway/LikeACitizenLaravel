<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
  public function cities()
  {
      return $this->belongsToMany('App\City');
  }
  public function categories()
      {
          return $this->belongsToMany('App\Category');
      }
}
