@extends('layouts.app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
            <div class="card-body row">
                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2>UDD PMI<strong> PMI Kota Cirebon</strong></h2>
                        <p class="lead mb-5">Jl. Dr. Sudarsono No. 8 Kesambi<br>
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    @if(session('success_store'))
                    <div class="alert alert-success">
                        {{ session('success_store') }}
                    </div>
                    @elseif(session('error_store'))
                    <div class="alert alert-danger">
                        {{ session('error_store')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('pesanCreate') }}">
                        @csrf <!-- Tambahkan csrf field -->
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" /> <!-- Tambahkan name="name" -->
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" id="email" name="email" class="form-control" /> <!-- Tambahkan name="email" -->
                        </div>
                        <div class="form-group">
                            <label for="about">Perihal</label>
                            <input type="text" id="about" name="about" class="form-control" /> <!-- Tambahkan name="about" -->
                        </div>
                        <div class="form-group">
                            <label for="message">Pertanyaan atau Pesan</label>
                            <textarea id="message" name="message" class="form-control" rows="4"></textarea> <!-- Tambahkan name="message" -->
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Kirim pesan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
