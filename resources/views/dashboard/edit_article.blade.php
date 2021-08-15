@extends('dashboard.layouts.app')

@section('content')
<h1 class="mt-4">Edit article : <a href="{{ route('article', $post->id) }}">{{ $post->title }}</a></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard / Articles / Edit article</li>
</ol>

@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ $error }}
    </div>
@endforeach

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle"></i> {{ session()->get('success') }}
    </div>
@endif

<form method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title :</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image URL :</label>
        <input type="text" class="form-control" name="image" id="image" value="{{ $post->image }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control" name="content" id="content" rows="10">{{ $post->content }}</textarea>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <button class="btn btn-lg btn-primary" type="submit">Edit article</button>
    </div>
</form>
@endsection