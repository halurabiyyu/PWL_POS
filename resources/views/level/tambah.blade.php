@extends('adminlte::page')
@section('title', 'User')
@section('content_header')
<h1>Tambah Data Level</h1>
@stop
@section('content')

<div class="col">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Create Level</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama Level</label>
                            <input type="text" class="form-control" placeholder="nama level...">
                            <label>Kode Level</label>
                            <input type="text" class="form-control" placeholder="kode level...">
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
