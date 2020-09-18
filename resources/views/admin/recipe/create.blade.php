@extends('layouts.admin')


@section('title', 'レシピの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピ新規作成</h2>
                <form action="{{ action('Admin\RecipeController@create') }}" method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                  <ul>
                    @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                    @endforeach
                  </ul>
                @endif
                <div class="form-group row">
                  <label class="col-md-2">料理名</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">カテゴリ</label>
                  <div class="col-md-10">
                    <select name="category_id">
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">調理時間(/分)</label>
                  <div class="col-md-10">
                    <select name="time_id">
                      @foreach($times as $time)
                      <option value="{{ $time->id }}">{{ $time->time_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">タグ</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="tag" rows="1">{{ old('tag') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2" for="title">トップ画像</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control-file" name="top_image">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">概要</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="overview" rows="10">{{ old('overview') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">材料</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="ingredient" rows="10">{{ old('ingredient') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">作り方</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="step" rows="10">{{ old('step') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ1タイトル</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo1_title" rows="1">{{ old('memo1_title') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ1内容</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo1_content" rows="3">{{ old('memo1_content') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2" for="title">メモ1画像</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control-file" name="memo1_image">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ2タイトル</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo2_title" rows="1">{{ old('memo2_title') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ2内容</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo2_content" rows="3">{{ old('memo2_content') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2" for="title">メモ2画像</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control-file" name="memo2_image">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ3タイトル</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo3_title" rows="1">{{ old('memo3_title') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2">メモ3内容</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="memo3_content" rows="3">{{ old('memo3_content') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2" for="title">メモ3画像</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control-file" name="memo3_image">
                  </div>
                </div>
              {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="保存">
              </form>
            </div>
        </div>
    </div>
@endsection

