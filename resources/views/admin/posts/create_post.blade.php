@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h2>Create New Post</h2>

        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="container mt-4">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
