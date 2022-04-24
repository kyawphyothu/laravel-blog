@extends('layouts.app');

@section('content')
    <div class="container">

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }},
                    <b>Category: {{ $article->Category->name }}</b>
                </div>
                <p class="card-text">
                    {{ $article->body }}
                </p>
                <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning">Delete</a>
            </div>
        </div>

        <ul class="list-group mb-3">
            <li class="list-group-item active">
                Comment ({{ count($article->Comments) }})
            </li>
            @foreach ($article->Comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                </li>
            @endforeach
        </ul>

        <form action="/comments/add" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2"></textarea>
            <input type="submit" class="btn btn-primary">
        </form>

    </div>
@endsection
