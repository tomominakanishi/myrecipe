<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Recipe;
use App\Tag;
use App\Time;
use App\RecipeTag;
class RecipeController extends Controller
{
  public function add()
  {
    $categories = Category::all();
    $times = Time::all();
    return view('admin.recipe.create',["categories" => $categories],["times" => $times]);
  }

  public function create(Request $request)
  {
    $this->validate($request, Recipe::$rules);
   
    $tag = new Tag;
    $recipe = new Recipe;
    $form = $request->all();
    
    //recipeデータの保存(recipe_idを発番)
    if (isset($form['top_image'])) {
      $path = $request->file('top_image')->store('public/image');
      $recipe->top_image_path = basename($path);
    } else {
      $recipe->top_image_path = null;
    }
    
    if (isset($form['memo1_image'])) {
      $path = $request->file('memo1_image')->store('public/image');
      $recipe->memo1_image_path = basename($path);
    } else {
      $recipe->memo1_image_path = null;
    }
    
    if (isset($form['memo2_image'])) {
      $path = $request->file('memo2_image')->store('public/image');
      $recipe->memo2_image_path = basename($path);
    } else {
      $recipe->memo2_image_path = null;
    }
    
    if (isset($form['memo3_image'])) {
      $path = $request->file('memo3_image')->store('public/image');
      $recipe->memo3_image_path = basename($path);
    } else {
      $recipe->memo3_image_path = null;
    }
        
    unset($form['_token']);
    
    unset($form['top_image']);
    unset($form['memo1_image']);
    unset($form['memo2_image']);
    unset($form['memo3_image']);
    
    unset($form['tag']);
    
    $recipe->fill($form);
    $recipe->save();
  
    
    if (!empty($request->tag)){
      $tag_names=explode("#", $request->tag);
      foreach($tag_names as $tag_name){
        $data = null;
        if(!empty($tag_name)){
          $data = Tag::where('name',$tag_name)->first();
          
          if(!$data){
            $data = new Tag;
            $data->name=$tag_name;
            $data->save();
          }
          //recipeがもつtagのデータを作成
          $recipes_tag = new RecipeTag;
          $recipes_tag->recipe_id = $recipe->id;
          $recipes_tag->tag_id = $data->id;
          $recipes_tag->save();
        }
        
      }
    }
    
       
      return redirect('admin/recipe/create');
  }

 public function edit(Request $request)
  {
    $categories = Category::all();
    $times = Time::all();
    //Recipe Modelからデータを取得する
    $recipe = Recipe::find($request->id);
    if (empty($recipe)) {
      abort(404);    
      }
    $str_tags = '';
    foreach ($recipe->tags as $tag){
      $str_tags .= ("#" . $tag->name);
    }
   return view('admin.recipe.edit', ['recipe_form' => $recipe,"categories" => $categories,"times" => $times, "str_tags" => $str_tags]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Recipe::$rules);
      
      //Tagモデルを利用する
      $tag = new Tag;
      
      // Recipe Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      
      // 送信されてきたフォームデータを格納する
      $recipe_form = $request->all();
      
      if (isset($recipe_form['top_image'])) {
        $path = $request->file('top_image')->store('public/image');
        $recipe->top_image_path = basename($path);
        unset($recipe_form['top_image']);
      } elseif (isset($request->remove)) {
        $recipe->top_image_path = null;
        unset($recipe_form['remove']);
      }
      if (isset($recipe_form['memo1_image'])) {
        $path = $request->file('memo1_image')->store('public/image');
        $recipe->memo1_image_path = basename($path);
        unset($recipe_form['memo1_image']);
      } elseif (isset($request->remove)) {
        $recipe->memo1_image_path = null;
        unset($recipe_form['remove']);
      }
      if (isset($recipe_form['memo2_image'])) {
        $path = $request->file('memo2_image')->store('public/image');
        $recipe->memo2_image_path = basename($path);
        unset($recipe_form['memo2_image']);
      } elseif (isset($request->remove)) {
        $recipe->memo2_image_path = null;
        unset($recipe_form['remove']);
      }
      if (isset($recipe_form['memo3_image'])) {
        $path = $request->file('memo3_image')->store('public/image');
        $recipe->memo3_image_path = basename($path);
        unset($recipe_form['memo3_image']);
      } elseif (isset($request->remove)) {
        $recipe->memo3_image_path = null;
        unset($recipe_form['remove']);
      }
      
      unset($recipe_form['_token']);
      unset($recipe_form['tag']);

      // 該当するデータを上書きして保存する
      $recipe->fill($recipe_form)->save();
      
      if (!empty($request->tag)){
      $tag_names=explode("#", $request->tag);
      foreach($tag_names as $tag_name){
        $data = null;
        if(!empty($tag_name)){
          $data = Tag::where('name',$tag_name)->first();
      
          if(!$data){
            $data = new Tag;
            $data->name=$tag_name;
            $data->save();
          }
          //recipeがもつtagのデータを作成
          $recipes_tag = new RecipeTag;
          $recipes_tag->recipe_id = $recipe->id;
          $recipes_tag->tag_id = $data->id;
          $recipes_tag->save();
        }
      }
    }

      return redirect('admin/recipe');
  }

  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $recipes = Recipe::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのレシピを取得する
          $recipes = Recipe::all();
      }
      return view('admin.recipe.index', ['recipes' => $recipes, 'cond_title' => $cond_title]);
  }

  public function delete(Request $request)
  {
    // 該当するRecipe Modelを取得
    $recipes = Recipe::find($request->id);
    // 削除する
    $recipes->delete();
    return redirect('admin/recipe/');
  }  

}
