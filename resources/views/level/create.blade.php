@extends('layout.template') 
 
@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            <form method="POST" action="{{ url('level') }}" class="form-horizontal"> 
                @csrf  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Kode Level</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="level_kode" name="level_kode" value="{{ old('level_kode') }}" required> 
                        @error('level_kode') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Nama</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ old('level_nama') }}" required> 
                        @error('level_nama') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label"></label> 
                    <div class="col-11"> 
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('level') }}">Kembali</a> 
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