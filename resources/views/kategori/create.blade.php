@extends('layout.template') 
 
@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            <form method="POST" action="{{ url('kategori') }}" class="form-horizontal"> 
                @csrf  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Kode Kategori</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" value="{{ old('kategori_kode') }}" required> 
                        @error('kategori_kode') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Nama Kategori</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="{{ old('kategori_nama') }}" required> 
                        @error('kategori_nama') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label"></label> 
                    <div class="col-11"> 
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('kategori') }}">Kembali</a> 
                    </div> 
                </div> 
            </form> 
        </div> 
    </div> 
@endsection 
@push('css') 
@endpush 
@push('js') 
@endpush





{{-- @extends('layout.app') --}}

{{-- Customize layout section  --}}

{{-- @section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'create') --}}

{{-- Content body: main page content  --}}

{{-- @section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Buat Level Baru
                </h3>
            </div>

            <form method="post" action="../level">
                {{ csrf_field() }}
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="level_nama">Nama level</label>
                        <input type="text" class="@error('level_nama') is-invalid @enderror" id="level_nama" name="level_nama" placeholder="Nama level">
                    </div>
                    @error('level_nama')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="level_kode">Kode level</label>
                        <input type="text" class="@error('level_kode') is-invalid @enderror" id="level_kode" name="level_kode" placeholder="Kode level">
                    </div>
                    @error('level_kode')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                
    
                
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



     --}}




{{-- @extends('layout.app') --}}

{{-- Customize layout section  --}}

{{-- @section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'create') --}}

{{-- Content body: main page content  --}}

{{-- @section('content')
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
                </div> --}}
                {{-- Jobsheet 6 - B No 10 --}}
                {{-- <label for="kategori_kode">Kode Kategori</label>
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

 --}}

    