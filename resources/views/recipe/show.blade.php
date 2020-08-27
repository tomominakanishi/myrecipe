@extends('layouts.style')

@section('content')
    <header>
        <div class="container">
            <hr color="#c0c0c0">
            <div class="row">
                <div class="col-md-8 mx-auto mt-3">
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
            </div>
        </div>
    </header>
    
    <div class= "main">
      <div class= "container">
        <hr color="#c0c0c0">
        <div class="row">
          <div class="col-md-8 mx-auto mt-3">
            <div class="recipe-title">
               <h1>{{ $recipe->title }}</h1>
            </div>
            <div class="tag">
               <p>{{ $str_tags }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class= "container">
        <!--<div class="row">-->
          <div class="col-md-8 mx-auto mt-3">
           <div class="recipe-contents">
             <div class="recipe-left">
               <img src="{{ asset('storage/image/' . $recipe->top_image_path) }}">
              </div>
              <div class="recipe-right">
                <div class="overview">
                  <p>"{{ $recipe->overview }}"</p>
                </div>
                <div class="time">
                  {{ "調理" . $recipe->time->time_name . "分" }}
                </div>
                <div class="good">
                  <p>いいね！</p>
                </div>
              </div>
             </div>
           </div>
              
      <!--</div>-->
     
          
              
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->top_image_path)
                                    <img src="{{ asset('strage/image/' . $recipe->top_image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
            </div>
        </div>
    </div>

@endsection