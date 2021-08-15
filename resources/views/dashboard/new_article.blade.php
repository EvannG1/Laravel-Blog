@extends('dashboard.layouts.app')

@section('content')
<h1 class="mt-4">New article</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard / Articles / New article</li>
</ol>

@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ $error }}
    </div>
@endforeach

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title :</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control" name="content" id="content" rows="10" required></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image :</label>
        <input type="file" class="form-control" name="image" id="image" required>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <button class="btn btn-lg btn-primary" type="submit">Create article</button>
    </div>
</form>
@endsection