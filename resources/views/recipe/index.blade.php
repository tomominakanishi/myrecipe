@extends('layouts.front')

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
              @foreach($recipes as $recipe)
                    <div class="big-contents">
                        <img src="{{ asset('storage/image/' . $recipe->top_image_path) }}">
                        <div class="text-title">
                            <a href= "{{ action('RecipeController@show', ['id' => $recipe->id]) }}">{{ $recipe->title }}</a>
                        </div>
                        <div class="text-content">
                            {{ "調理" . $recipe->time->time_name . "分" }}
                        </div>
                    </div>
              @endforeach
  
            </div>
      </div>
    </div>
    <footer>
      <p class="copyright">(C) 2020 recipe blog All rights reserved.</p>
    </footer>
@endsection
