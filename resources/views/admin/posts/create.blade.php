@extends('layouts.base')

@section('title','new post')

@section('content')
    <h1>Crea post</h1>  

    <form action="{{route("admin.posts.store")}}" method="POST">
        
        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del post" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" placeholder="Inserisci il contenuto del post">{{old('content')}}</textarea>
        </div>
        {{-- <div class="form-group">
            <label for="published">Published</label>
            <input type="text" class="form-control" id="published" name="published" placeholder="Inserisci 1 per pubblicare il posto 0 altrimenti" value="{{old('published')}}">
        </div> --}}
        <div class="form-group">
            <label for="published">Published</label>
            <select class="form-control" id="published" name="published">
                <option>Choose...</option>'
                <option {{old('published') == '1' ? 'selected' : ''}} value="1">True</option>
                <option {{old('published') == '0' ? 'selected' : ''}} value="0">False</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categories">Categories</label>
            <select class="form-control" id="categories" name="category_id">
                <option>Choose...</option>
                @foreach ($categories as $category)
                    <option @if (old('category_id') == $category->id) {{ 'selected' }} @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{route("admin.posts.index")}}"><button type="button" class="btn btn-primary">back</button></a>
        <button type="submit" class="btn btn-success">add</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection