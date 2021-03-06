<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = array('id');
 
  public static $rules = array(
    'category_name' => 'required',
  );
  
  public function recipes()
  {
    return $this->hasMany('App\Recipe');
  }
}
