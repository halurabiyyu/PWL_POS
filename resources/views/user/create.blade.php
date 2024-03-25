{{-- <body>
    <h1>Form Tambah Data User</h1>
    <a href={{route('/user')}}>Kembali</a>
    <form method="POST" action={{route('/user/tambah_simpan')}}>
        {{csrf_field()}}
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id">
        <br>
        <input type="submit" name="btn btn-success" value="simpan">
    </form>
</body> --}}

@extends('layout.app')

{{-- Customize layout section  --}}

@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'create')

@section('content')
<div class="col">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action='../user'>
                {{csrf_field()}}
                <div class="row">
                    <div class="col">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="@error('username') form-control is-invalid @enderror" id="username" name="username" placeholder="username...">
                            @error('username')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            
                            <label>Nama</label>
                            <input type="text" class="@error('nama') form-control is-invalid @enderror" id="nama" name="nama" placeholder="nama...">
                            @error('nama')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            
                            
                            <label>Password</label>
                            <input type="password" class="@error('password') form-control is-invalid @enderror" id="password" name="password" placeholder="password...">
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            
                            <label>Level ID</label>
                            <input type="text" class="@error('level_id') form-control is-invalid @enderror" id="level_id" name="level_id" placeholder="level id...">
                            @error('level_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-end">
                            <button type ="submit" class ="btn btn-primary">Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
