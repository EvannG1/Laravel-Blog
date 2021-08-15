@extends('layouts.app')

@section('content')
<div class="container text-center pt-3">
    <h1 class="display-5">{{ $post->title }}</h1>
    <p class="lead">Posté par <b>{{ $post->user->name }}</b></p>
    @if (Auth::check())
        <a class="btn btn-primary" href="{{ route('admin.edit_article', $post->id) }}">Edit this article</a>
    @endif
    <hr>
    <div class="row">
        <div class="col-lg-6">
            @if (str_contains($post->image, 'http'))
                <img src="{{ $post->image }}" alt="{{ $post->title }}" width="500">
            @else
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" width="500">
            @endif
        </div>
        <div class="col-lg-6 d-flex align-items-center" style="font-size:24px;">
            <p>{{ $post->content }}</p>
        </div>
    </div>
</div>
@endsection