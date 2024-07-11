@extends('layouts.template')

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
                    Data yang Anda cari tidak ditemukan
                </div>
                <a href="{{ url('kategori') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form action="{{ url('/kategori/' . $kategori->kategori_id) }}" method="POST" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Id (Auto increment)</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="kategori_id" name="kategori_id"
                                value="{{ old('kategori_id', $kategori->kategori_id) }}" disabled>
                            @error('kategori_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Nama Kategori</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $kategori->nama) }}" required>
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Judul</label>
                        <div class="col-10">
                            <textarea class="form-control" id="judul" name="judul" required>{{ old('judul', $kategori->judul) }}</textarea>
                            @error('judul')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{ url('kategori') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
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
