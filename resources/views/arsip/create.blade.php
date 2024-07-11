@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('arsip') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">No Surat</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="no_surat" name="no_surat"
                            value="{{ old('no_surat') }}" required>
                        @error('no_surat')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kategori</label>
                    <div class="col-10">
                        <select class="form-control" id="ktgr_id" name="ktgr_id" required>
                            <option value="" disabled>Select Option</option>
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
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                            required>
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
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('arsip') }}">Kembali</a>
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
