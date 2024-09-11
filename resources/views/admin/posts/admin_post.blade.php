@extends('layouts.adminapp')

@section('content')
<div class="container">
<a href="{{route('home')}}" class="btn btn-link">Back</a> 
<div class="container">
        <h5 class="text-center">Kelola Data Post Dashboard User - Admin Page</h2>
 <!--button CREATE-->
 <div class="container">
 <a href="{{ route('admin.post.store') }}" type="button" class="btn btn-secondary btn-sm">Create Data</a>
</div>

<div class="card-body">
@if(session('success_post_create'))
        <div class="alert alert-success">
          {{ session('success_post_create') }}
        </div>
@elseif(session('error_post_create'))
        <div class="alert alert-danger">
          {{ session('error_post_create')}}
@endif

@if(session('success_post_edit'))
        <div class="alert alert-success">
          {{ session('success_post_edit') }}
        </div>
@elseif(session('error_post_edit'))
        <div class="alert alert-danger">
          {{ session('error_post_edit')}}
@endif

@if(session('success_post_delete'))
        <div class="alert alert-success">
          {{ session('success_post_delete')}}
        </div>
@elseif(session('error_post_delete'))
        <div class="alert alert-danger">
          {{ session('error_post_delete')}}
        </div>
@endif
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi Konten</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('path-to-images/' . $post->image) }}" alt="{{ $post->title }}" height="50">
                            @endif
                        </td>
                        <td>
                        <!--butoon edit-->
                        @csrf 
                        <a href="{{route('admin.post.update', $post->id)}}" class="btn btn-primary">Edit</a>
                        <!--button delete-->
                        <form action="{{route('admin.post.delete', $post->id)}}" method="POST" style="display: inline;">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure want to delete this post data?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
