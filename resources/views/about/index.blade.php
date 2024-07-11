@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-2">
                    <div class="square-image">
                        <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" alt="Square Image">
                    </div>
                    <!-- Content for the first column -->
                </div>
                @foreach ($users as $user)
                    <div class="col-md-10">
                        <h6>Aplikasi ini dibuat oleh :</h6>
                        <p>Nama : {{ $user->name }}</p>
                        <p>Prodi : {{ $user->prodi }}</p>
                        <p>Nim : {{ $user->nim }}</p>
                        <p>Tanggal : {{ $user->tanggal_buat }}</p>
                        <!-- Content for the second column -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
