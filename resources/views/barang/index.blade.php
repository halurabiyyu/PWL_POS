@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$page->title}}</h3>
            <div class="card-tools">
                <a href="{{url('barang/create')}}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="" class="col-1 control-label col-form-label">Filter: </label>
                        <div class="col-3">
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() { 
            var dataBarang = $('#table_barang').DataTable({ 
            serverSide: true,     // serverSide: true, jika ingin menggunakan server side processing 
            ajax: { 
                "url": "{{ url('barang/list') }}", 
                "dataType": "json", 
                "type": "POST",
                "data": function (d) {
                    d.kategori_id = $('#kategori_id').val();
                }
            }, 
            columns: [ 
                { 
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()            
                    className: "text-center", 
                    orderable: false, 
                    searchable: false     
                },
                { 
                    data: "barang_kode",                
                    className: "", 
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari 
                },
                { 
                    data: "barang_nama",                
                    className: "", 
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari 
                },
                { 
                    data: "kategori.kategori_nama",                
                    className: "", 
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari 
                },
                { 
                    data: "harga_beli",                
                    className: "", 
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari 
                },
                { 
                    data: "harga_jual",                
                    className: "", 
                    orderable: true,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: true    // searchable: true, jika ingin kolom ini bisa dicari 
                },
                { 
                    data: "aksi",                
                    className: "", 
                    orderable: false,    // orderable: true, jika ingin kolom ini bisa diurutkan 
                    searchable: false    // searchable: true, jika ingin kolom ini bisa dicari 
                } 
            ] 
        });

        $('#kategori_id').on('change', function() {
            dataBarang.ajax.reload();
        })
    }); 
  </script> 
@endpush 


{{-- @extends('layout.app') --}}

{{-- Customize layout section  --}}

{{-- @section('subtitle', 'Level')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Level') --}}

{{-- Content body: main page content  --}}

{{-- @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Level</div>

            <div class="card-body">
                
                <a href={{ route('/level/tambah') }} class="btn btn-primary m-2">ADD</a>
                
                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
 --}}

    



{{-- @extends('layout.app') --}}

{{-- Customize layout section  --}}

{{-- @section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori') --}}

{{-- Content body: main page content  --}}

{{-- @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>

            <div class="card-body"> --}}
                
                {{-- Jobsheet 5 - Tugas No 1 --}}
                {{-- <a href={{ route('/kategori/create') }} class="btn btn-primary m-2">ADD</a>
                
                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
@endsection --}}


{{-- @push('scripts')
    {{ $dataTable->scripts() }}
@endpush

 --}}
    