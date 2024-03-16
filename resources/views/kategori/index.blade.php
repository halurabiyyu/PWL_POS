@extends('layout.app')

{{-- Customize layout section  --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

{{-- Content body: main page content  --}}

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>

            <div class="card-body">
                
                {{-- Jobsheet 5 - Tugas No 1 --}}
                <a href={{ route('/kategori/create') }} class="btn btn-primary m-2">ADD</a>
                
                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts() }}
@endpush


    