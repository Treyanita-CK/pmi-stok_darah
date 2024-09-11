@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h2>Edit Post</h2>

        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" rows="5" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="container mt-4">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
