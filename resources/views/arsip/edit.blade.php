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
                    Data yang Anda cari tidak ditemukan
                </div>
                <a href="{{ url('arsip') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form action="{{ url('/arsip/' . $arsip->arsip_id) }}" method="POST" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">No Surat</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                value="{{ old('no_surat', $arsip->no_surat) }}" required>
                            @error('no_surat')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Kategori</label>
                        <div class="col-10">
                            <select class="form-control" id="ktgr_id" name="ktgr_id" required>
                                <option value="{{ old('ktgr_id', $arsip->kategori->nama) }}" disabled>Select Option</option>
                                @foreach ($option as $opt)
                                    <option value="{{ $opt->kategori_id }}">{{ $opt->nama }}</option>
                                @endforeach
                            </select>
                            @error('ktgr_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Judul</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ old('judul', $arsip->judul) }}" required>
                            @error('judul')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">File Surat (PDF)</label>
                        <div class="col-10">
                            <input type="file" class="form-control" id="file" name="file" required>
                            @error('file')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{ url('arsip') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
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
