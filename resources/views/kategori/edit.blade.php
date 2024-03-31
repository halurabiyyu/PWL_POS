@extends('layout.template') 
 
@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
        <h3 class="card-title">{{ $page->title }}</h3> 
        <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
        @empty($kategori) 
            <div class="alert alert-danger alert-dismissible"> 
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                Data yang Anda cari tidak ditemukan. 
            </div> 
            <a href="{{ url('kategori') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        @else 
            <form method="POST" action="{{ url('/kategori/'.$kategori->kategori_id) }}" class="form-horizontal"> 
                @csrf 
                {!! method_field('PUT') !!}  <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Kode Kategori</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" value="{{ old('kategori_kode', $kategori->kategori_kode) }}" required> 
                        @error('kategori_kode') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Nama Kategori</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="{{ old('kategori_nama', $kategori->kategori_nama) }}" required> 
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
        @endempty 
        </div> 
    </div> 
@endsection 
 
@push('css') 
@endpush 
@push('js') 
@endpush


{{-- @extends('layout.app') --}}

{{-- Customize layout section  --}}

{{-- @section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit') --}}

{{-- Content body: main page content  --}}

{{-- @section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Kategori
                </h3>
            </div>

            <form method="POST" action={{route('/kategori/edit_save', $data->kategori_id)}}>
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="{{$data->kategori_kode}}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{$data->kategori_nama}}">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection --}}



    
