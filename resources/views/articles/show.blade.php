@extends('articles.layout')


@section('title', $article->title)


@section('main')
    <article>
        <h1>{{ $article->title }}</h1>
        <div class="text-muted">
            <date class="text-muted" id="article-date">
                {{ $article->date }}
            </date>
                <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
            @foreach ($article->tags as $tag)
                <a href="{{ url('/articles') }}?tag={{ $tag->name }}">
                    <i>#{{ $tag->name }}</i>
                </a>
                &nbsp;
            @endforeach
        </div>
        <p class="article__text">{{ $article->text }}</p>
    </article>
@endsection
