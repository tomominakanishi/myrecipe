<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $guarded = array('id');
   
   public function recipes()
  {
    return $this->belongsToMany('App\Recipe');
  } 
}
