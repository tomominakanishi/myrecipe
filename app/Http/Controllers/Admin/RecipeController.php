<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class RecipeController extends Controller
{
  public function add()
  {
    $categories = Category::all();
    return view('admin.recipe.create',["categories" => $categories]);
  }

  public function create()
  {
    $this->validate($request, Recipe::$rules);
    
    $recipe = new Recipe;
    $form = $request->all();
    
    if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $recipe->image_path = basename($path);
      } else {
          $recipe->image_path = null;
          
          unset($form['_token']);
          
          unset($form['image']);
          
          $recipe->fill($form);
          $recipe->save();
      
      return redirect('admin/recipe/create');
      }
  }

  public function edit()
  {
    return view('admin.recipe.edit');
  }

  public function update()
  {
    return view('admin/recipe/edit');
  }

  public function index()
  {
    return view('admin.recipe.index');
  }
  
}


