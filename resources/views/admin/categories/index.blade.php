@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    {{--        <h1 class="h3 mb-0 text-gray-800">Панель администратора</h1>--}}
    @include('inc.messages')
    <h1 class="h3 mb-0 text-gray-800">Список категорий</h1>
    <a href=" {{ route('admin.categories.create')  }} " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Добавить категорию </a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Кол-во новостей</th>
                    <th>Заголовок</th>
                    <th>Дата добавления</th>
                    <th>Управления</th>
                </tr>
                </thead>


                <tbody>
                  @forelse($categories as $category)
                      <tr>
                          <td>{{ $category->id }}</td>
                          <td>({{ $category->news_count }}) </td>
                          <td>{{ $category->title }}</td>
                          <td>{{ $category->created_at }}</td>
                          <td>
                              <a href=" {{ route('admin.categories.edit', ['category' => $category->id]) }} ">Ред.</a>
                              &nbsp;
                              <a href="">Уд.</a>
                          </td>
                      </tr>
                  @empty
                      <h2>Категорий нет</h2>
                  @endforelse
                </tbody>



            </table>
        </div>
    </div>
</div>

@endsection
