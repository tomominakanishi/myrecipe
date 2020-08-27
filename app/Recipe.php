<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $guarded = array('id');
  public static $rules = array(
      'title' => 'required',
      'ingredient' => 'required',
      'step' => 'required',
  );
    
  public function category()
  {
    return $this->belongsTo('App\Category');
  } 
  
  public function time()
  {
    return $this->belongsTo('App\Time');
  } 
  
  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  } 
}
