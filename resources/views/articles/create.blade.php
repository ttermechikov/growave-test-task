@extends('articles.layout')

@section('title', 'Блог - Добавить статью')

@section('main')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Добавление новой статьи</h2>
        </div>
        <br>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Упс!</strong> Что-то пошло не так!<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('articles.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Введите тему статьи" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input id="article-date" type="date" name="date" class="form-control" required >
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="tags" class="form-control" id="tags" placeholder="Введите теги" autocomplete="off" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <textarea name="text" class="form-control" style="height:150px" name="detail" placeholder="Введите текст статьи" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Добавить статью</button>
        </div>
        
    </div>

</form>

<script>
    var elem = document.getElementById('article-date');
    var today = new Date();
    elem.value = today.toISOString().substr(0, 10);

    var tagsEl = document.getElementById('tags');
    tagsEl.addEventListener('input', function(e) {
        e.target.value = e.target.value.toLowerCase();
    });
</script>

@endsection
