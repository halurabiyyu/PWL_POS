@extends('layout.app')

{{-- Customize layout section  --}}

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

{{-- Content body: main page content  --}}

@section('content')
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


    