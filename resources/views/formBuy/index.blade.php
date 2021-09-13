@extends('layouts.form_buy')
@section('content')
    <h3> Форму заказа на получение выгрузки данных: </h3>
    <div class="row mt-4 mb-4">
        <div class="col-md-8">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('form_buy.store')  }} ">
                @csrf
                <div class="form-group">
                    <label for="title"> Имя </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title')  }}">
                </div>
                <div class="form-group">
                    <label for="author"> Номер телефона </label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author')  }}">
                </div>

                <div class="form-group">
                    <label for="author"> Email-адрес </label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author')  }}">
                </div>

                <div class="form-group">
                    <label for="description"> Информация о получение </label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
@endsection
