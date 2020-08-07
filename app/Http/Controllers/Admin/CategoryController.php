<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    public function add()
  {
    $categories = Category::all();
    return view('admin.category.create',["categories" => $categories]);
  }
  
  public function create(Request $request)
  {
    $this->validate($request, Category::$rules);
    $category = new Category;
    $form = $request->all();
    unset($form['_token']);
    $category->timestamps = false; 
    $category->fill($form);
    $category->save();
    
    return redirect('admin/category/create');
  }
  
}
