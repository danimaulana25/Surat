@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3><br>
            <h3 class="card-title">Klik tombol "Tambah" pada kolom aksi untuk menambahkan kategori baru.</h3>
            <div class="card-tools">
                <a href="{{ url('kategori/create') }}" class="btn btn-sm btn-primary mt-1">Tambah</a>
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
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
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
            var dataUser = $('#table_kategori').DataTable({
                serverSide: true, //serverside true jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('kategori/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [{
                    data: "kategori_id", //nomor urut dari laravel datatable addindexcolumn()
                    classname: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama",
                    classname: "",
                    orderable: true, //orderable true jika ingin kolom bisa diurutkan
                    searchable: true //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "judul",
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
            $('#kategori_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
