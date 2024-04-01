@extends('layout.template') 
 
@section('content') 
    <div class="card card-outline card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">{{ $page->title }}</h3> 
            <div class="card-tools"></div> 
        </div> 
        <div class="card-body"> 
            @empty($detailPenjualan) 
                <div class="alert alert-danger alert-dismissible"> 
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> 
                    Data yang Anda cari tidak ditemukan. 
                </div> 
            @else 
                <table class="table table-bordered table-striped table-hover table-sm"> 
                    <tr> 
                        <th>ID</th> 
                        <th>Tanggal</th> 
                        <th>Pembeli</th> 
                        <th>Barang</th> 
                        <th>Harga</th> 
                        <th>Jumlah</th> 
                        <th>Total</th> 
                    </tr> 
                    @foreach ($detailPenjualan as $item)
                        <tr> 
                            <td>{{ $item->penjualan_id }}</td> 
                            <td>{{ $item->penjualan->penjualan_tanggal }}</td> 
                            <td>{{ $item->penjualan->pembeli }}</td>
                            <td>{{ $item->barang->barang_nama }}</td> 
                            <td>{{ $item->harga }}</td> 
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->jumlah * $item->harga }}</td>

                        </tr>                         
                    @endforeach
                </table> 
            @endempty 
            <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        </div> 
    </div> 
@endsection 
 
@push('css') 
@endpush 
 
@push('js') 
@endpush