@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Category ID</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
@endsection
