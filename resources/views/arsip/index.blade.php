@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h3><br>
            <h3 class="card-title">Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h3>
            <div class="card-tools">
                <a href="{{ url('arsip/create') }}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="level_id" id="level_id" class="form-control">
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div> --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_arsip">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu pengarsipan</th>
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
            var dataUser = $('#table_arsip').DataTable({
                serverSide: true, //serverside true jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('arsip/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.arsip_id = $('#arsip_id').val();
                    }
                },
                columns: [{
                    data: "no_surat", //nomor urut dari laravel datatable addindexcolumn()
                    classname: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "kategori.nama",
                    classname: "",
                    orderable: true, //orderable true jika ingin kolom bisa diurutkan
                    searchable: true //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "judul",
                    classname: "",
                    orderable: true, //orderable true jika ingin kolom bisa diurutkan
                    searchable: true //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "tanggal_arsip",
                    classname: "",
                    orderable: false, //orderable true jika ingin kolom bisa diurutkan
                    searchable: false //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "aksi",
                    classname: "",
                    orderable: false, //orderable true jika ingin kolom bisa diurutkan
                    searchable: false //searchable true jika ingin kolom bisa dicari
                }]
            });
            $('#arsip_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
