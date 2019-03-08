<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function country()
 {
     return $this->belongsTo('App\Country');
 }
 public function apps()
     {
         return $this->belongsToMany('App\App');
     }
}
