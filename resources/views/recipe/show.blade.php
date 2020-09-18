@extends('layouts.style')

@section('title', 'レシピ詳細')

@section('content')
<header>
      <div class="container">
        <div class="header-title-area">
          <h1 class="logo">My recipe</h1>
          <p class="text-sub">一番簡単なレシピ</p>
            <form action="{{ action('RecipeController@index') }}" method="get">                  
            <input type="search" size=30 name="cond_title" placeholder="料理名・レシピ名で検索" value="">
              {{ csrf_field() }}                  
              <input type="submit" name="submit" value="検索">
            </form>
        </div>
      </div>
</header>
    <div class= "main">
      <div class= "container">
        <div class= "recipe-title">
          <h1>{{ $recipe->title }}</h1>
        </div>
        <div class="tag">
          <p>{{ $str_tags }}</p>
        </div>
      </div>
      <div class= "container">
        <div class= "recipe-contents">
          <div class="recipe-left">
            <img src="{{ asset('storage/image/' . $recipe->top_image_path) }}">
          </div>
          <div class="recipe-right">
            <div class="overview">
              <p>{{ $recipe->overview }}</p>
            </div>
            <div class="time">
              <p>{{ "調理時間:" . $recipe->time->time_name . "分" }}</p>
            </div>
            <div class="good">
              <p>いいね！</p>
            </div>
          </div>
        </div>
      </div>
      <div class= "container">
        <div class= "recipe-detail">
          <div class= "ingredients">
            <h2>材料</h2>
            <p>{{ $recipe->ingredient }}</p>
          </div>
          <div class= "steps">
            <h2>作り方</h2>
            <p>{{ $recipe->step }}</p>
          </div>
        </div>
      </div>
      <div class= "container">
        <div class= "tips">
          <div class= "tips-title">
            <h2>お料理メモ</h2>
          </div>
          <div class= "tips-detail">
            <p>{{ $recipe->memo1_title }}</p>
          </div>
          <div class= "tips-image">
            <img src="{{ asset('strage/image/' . $recipe->memo1_image_path) }}">
          </div>
          <div class= "tips-notes">
            <p>{{ $recipe->memo1_content }}</p>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <p class="copyright">(C) 2020 recipe blog All rights reserved.</p>
    </footer>

@endsection