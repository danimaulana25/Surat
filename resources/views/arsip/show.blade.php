@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($arsip)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <h6>Nomor : {{ $arsip->no_surat }}</h6>
                <h6>Kategori : {{ $arsip->kategori->nama }}</h6>
                <h6>Judul : {{ $arsip->judul }}</h6>
                <h6>Waktu Unggah : {{ $arsip->tanggal_arsip }}</h6>
                <br>
                <iframe src="{{ asset('storage/files/' . $arsip->file) }}" width="100%" height="600px"
                    style="border: 0"></iframe>
            @endempty
            <a href="{{ url('arsip') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            <a href="{{ url('arsip/' . $arsip->arsip_id . '/edit') }}" class="btn btn-sm btn-primary mt-2">Edit</a>
            <a href="{{ asset('storage/files/' . $arsip->file) }}" class="btn btn-sm btn-success mt-2" download>Unduh</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
