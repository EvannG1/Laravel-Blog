@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light">
        <div class="container">
            <h1 class="display-3">Welcome on my blog!</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione corrupti tempore commodi vel dignissimos facilis reiciendis pariatur totam eius, facere qui quasi fugit praesentium numquam dolorem. Fugiat quam labore aut.</p>
            <p><a class="btn btn-primary" href="#">All articles</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 pb-3">
                    <div class="card h-100">
                        <a href="{{ route('article', $post->id) }}"><img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}"></a>
                        <div class="card-body">
                            <a href="{{ route('article', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                            <p class="card-text">{{ substr($post->content, 0, 200) }}...</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection