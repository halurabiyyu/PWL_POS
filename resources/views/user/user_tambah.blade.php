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

@extends('adminlte::page')
@section('title', 'User')
@section('content_header')
<h1>Tambah Data User</h1>
@stop
@section('content')

<div class="col">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Level ID</label>
                            <input type="text" class="form-control" placeholder="level id...">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="username...">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="nama...">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="password...">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type = "submit" class ="btn btn-primary">Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@stop
@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
