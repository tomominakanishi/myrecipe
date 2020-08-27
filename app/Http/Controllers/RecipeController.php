<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Category;
use App\Recipe;
use App\Tag;
use App\Time;
use App\RecipeTag;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $recipes = Recipe::all()->sortByDesc('updated_at');

        if (count($recipes) > 0) {
            $headline = $recipes->shift();
        } else {
            $headline = null;
        }
        
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
        // 検索されたら検索結果を取得する
            $recipes = Recipe::where('title', $cond_title)->get();
        // 検索結果がなかった場合
            if (count($recipes) === 0){
        //一覧を表示
            $recipes = Recipe::all();
            }
        }

        // recipe/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 recipes、という変数を渡している
        return view('recipe.index', ['headline' => $headline, 'recipes' => $recipes, 'cond_title' => $cond_title]);
    }
    
     public function show(Request $request)
    {
        $recipe = Recipe::find($request->id);
        if (empty($recipe)) {
            abort(404);
        }
        
        $str_tags = '';
        foreach ($recipe->tags as $tag){
        $str_tags .= ("#" . $tag->name);
        }
        
        
    
      return view('recipe.show', ['recipe' => $recipe, "str_tags" => $str_tags]);
    }
    
}