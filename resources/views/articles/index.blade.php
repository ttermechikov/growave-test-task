@extends('articles.layout')


@section('title', 'Блог - Все статьи')


@section('main')

    @if ($message = Session::get('success'))
        <br>
        <p class="alert alert-success">
            {{ $message }}
        </p>
    @endif

    @foreach ($articles as $article)
        <article class="article">
            <h2>{{ $article->title }}</h2>
            <div class="text-muted">
                <date id="article-date">
                    {{ $article->date }}
                </date>
                <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
                <span>
                    <i>{{ implode(', ', \App\Models\Tag::get_tag_names($article->id)) }}</i>
                </span>
            </div>
            
            <p>
                <div>
                    {{ \Illuminate\Support\Str::limit($article->text, 400, '...') }}
                </div>
                <div class="article__btn">
                    <a href="{{ route('articles.show',$article->id) }}">Читать далее...</a>
                </div>
            </td>
        </article>
    @endforeach

    @if (count($articles) >= 1)
        {{ $articles->withQueryString()->links() }}
    @endif

@endsection
