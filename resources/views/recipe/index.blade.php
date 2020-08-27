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
                            <input type="search" size=30 name="cond_title" placeholder="料理名・レシピ名で検索" value="{{ $cond_title }}">
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
                @foreach($recipes as $recipe)
                    <div class="big-contents">
                        <div class="row">
                            <div class="text col-md-6">
                                <img src="{{ asset('storage/image/' . $recipe->top_image_path) }}">
                                <div class="text-title">
                                    <a href= "{{ action('RecipeController@show', ['id' => $recipe->id]) }}">{{ $recipe->title }}</a>
                                </div>
                                <div class="text-content">
                                    {{ "調理" . $recipe->time->time_name . "分" }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->top_image_path)
                                    <img src="{{ asset('strage/image/' . $recipe->top_image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>

@endsection