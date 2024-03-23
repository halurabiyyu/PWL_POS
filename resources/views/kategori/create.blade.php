
@extends('layout.app')

{{-- Customize layout section  --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'create')

{{-- Content body: main page content  --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Buat Kategori Baru
                </h3>
            </div>

            <form method="post" action="../kategori">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_kode">Kode Kategori</label>
                        <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" placeholder="Kode Kategori">
                    </div>
                    <div class="form-group">
                    
                    </div>
                    <div class="form-group">
                        <label for="kategori_nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" placeholder="Nama Kategori">
                    </div>
                </div>
                {{-- Jobsheet 6 - B No 10 --}}
                <label for="kategori_kode">Kode Kategori</label>
                <input type="text" name="kategori_kode" class="@error('kategori_kode') is-invalid @enderror">
    
                @error('kategori_kode')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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



    