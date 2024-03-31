@extends('layout.template') 
 
@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            <form method="POST" action="{{ url('barang') }}" class="form-horizontal"> 
                @csrf 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Kategori</label> 
                    <div class="col-11"> 
                        <select class="form-control" id="kategori_id" name="kategori_id" required> 
                            <option value="">- Pilih kategori -</option> 
                            @foreach($kategori as $item) 
                                <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option> 
                            @endforeach 
                        </select>
                        @error('kategori_id') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Kode Barang</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode" value="{{ old('barang_kode') }}" required> 
                        @error('barang_kode') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div> 
                </div> 
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Nama barang</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="{{ old('barang_nama') }}" required> 
                        @error('barang_nama') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Harga Beli</label> 
                    <div class="col-11"> 
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" required> 
                        @error('harga_beli') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label">Harga Jual</label> 
                    <div class="col-11"> 
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" required> 
                        @error('harga_jual') 
                            <small class="form-text text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                </div>  
                <div class="form-group row"> 
                    <label class="col-1 control-label col-form-label"></label> 
                    <div class="col-11"> 
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('barang') }}">Kembali</a> 
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

    