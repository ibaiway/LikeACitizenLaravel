<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function countries()
 {
     return $this->belongsTo('App\Country');
 }
 public function apps()
     {
         return $this->belongsToMany('App\App');
     }
}
