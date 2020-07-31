<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'category_name' => 'required',
    );
}
