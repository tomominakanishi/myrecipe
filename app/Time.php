<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
  protected $guarded = array('id');
  
  public static $rules = array(
    'time_name' => 'required',
  );
  
  public function recipes()
  {
    return $this->hasMany('App\Recipe');
  }
}
