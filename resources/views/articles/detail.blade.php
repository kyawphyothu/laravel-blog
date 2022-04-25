@extends('layouts.app');

@section('content')
    <div class="container">

        {{-- alert start--}}
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
        @if (session('DelComSuccess'))
            <div class="alert alert-success">
                {{ session('DelComSuccess') }}
            </div>
        @endif
        {{-- @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif --}}
        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        {{-- alert end --}}

        <div class="card mb-2 bg-success text-light">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }},
                    <b>Category: {{ $article->category->name }}</b>
                </div>
                <p class="card-text">
                    {{ $article->body }}
                </p>
                Category: <b> {{ $article->category->name }}</b>,
                By <i>{{ $article->user->name }}</i>

                {{-- AuthServiceProvider မှာ ရှိ --}}
                {{-- @if ( Gate::allows('btn-article-delete', $article) )
                    <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning float-end">Delete</a>
                @endif --}}
                {{-- နှစ်ခုထဲကတစ်ခုကိုယူ --}}
                {{-- @auth --}}
                    @if ( auth()->user() && auth()->user()->id == $article->user_id )
                        <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning float-end">Delete</a>
                    @endif
                {{-- @endauth --}}
                {{--  --}}
            </div>
        </div>

        <ul class="list-group mb-3">
            <li class="list-group-item active">
                <b>Comment ({{ count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url("/comment/delete/$comment->id") }}" class="btn-close float-end"></a>
                    {{ $comment->content }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{ url("/comment/add") }}" method="post">
                @csrf
                <input type="hidden" name='article_id' value="{{ $article->id }}">
                <textarea name="content" placeholder="Enter new comment" class="form-control mb-2"></textarea>
                <input type="submit" value="Add Comment" class="btn btn-secondary">
            </form>
        @endauth

    </div>
@endsection
