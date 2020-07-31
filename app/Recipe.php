<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    'title' => 'required',
    'category_id' => 'required',
    'time_id' => 'required',
    'ingredient' => 'required',
    'step' => 'required',
}
