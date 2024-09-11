@extends('layouts.adminapp')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Hubungi Kami - Admin</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h5 class="text-center">Halaman Hubungi Kami - Admin</h5>
        <div class="card-body mt-4">
        @if(session('success_delete'))
                <div class="alert alert-success">
                {{ session('success_store') }}
                </div>
        @elseif(session('error_delete'))
                <div class="alert alert-danger">
                {{ session('error_store')}}
        @endif
    </header>
    <main>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">About</th>
                    <th scope="col">Message</th>
                    <th scope="col">Delete Message</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1;
                @endphp
                @foreach($message as $item)
                <tr>
                    <td>{{$nomor}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->about}}</td>
                    <td>{{$item->message}}</td>
                    <td>
                    <form action="{{route('destroy', $item->id)}}" method="POST" style="display: inline;">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this message?')">Delete</button>
                    </form>
                    </td>
                </tr>
                @php
                    $nomor++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>

@endsection