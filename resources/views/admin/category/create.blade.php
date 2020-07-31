@extends('layouts.admin')


@section('title', 'カテゴリの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>カテゴリ新規作成</h2>
                <form action="{{ action('Admin\CategoryController@create') }}" method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                  <ul>
                    @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                    @endforeach
                  </ul>
                @endif
                <div class="form-group row">
                  <label class="col-md-2">カテゴリ</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="category_name" value="{{ old('title') }}">
                  </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="保存">
                </form>
            </div>
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">既存カテゴリ名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{ $category->category_id }}</th>
                                    <td>{{ \Str::limit($category->category_name, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

