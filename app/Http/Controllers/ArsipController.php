<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Http\Requests\StoreArsipRequest;
use App\Http\Requests\UpdateArsipRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar arsip',
            'list'  => ['Home', 'arsip']
        ];

        $page = (object) [
            'title' => 'Berikut ini adalah arsip yang bisa digunakan untuk melabeli surat.'
        ];

        $activeMenu = 'arsip'; // set menu yang sedang aktif
        $arsip = Arsip::all();

        return view('arsip.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'arsip' => $arsip]);
    }

    public function list(Request $request)
    {
        $arsips = Arsip::select('arsip_id', 'ktgr_id', 'no_surat', 'judul', 'file', 'tanggal_arsip')->with('kategori');

        // Filter data level berdasarkan arsip_id
        if ($request->arsip_id) {
            $arsips->where('arsip_id', $request->arsip_id);
        }

        return DataTables::of($arsips)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($arsip) { // menambahkan kolom aksi
                $btn = ''; // initialize the $btn variable
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/arsip/' . $arsip->arsip_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form> ';
                $btn .= '<a href="' . url('/arsip/' . $arsip->arsip_id . '/edit') . '" class="btn btn-info btn-sm m-1">Edit</a>';
                $btn .= '<a href="' . asset('storage/files/' . $arsip->file) . '" class="btn btn-success btn-sm m-1" download>Unduh</a>';
                $btn .= '<a href="' . url('/arsip/' . $arsip->arsip_id) . '" class="btn btn-primary btn-sm m-1">Lihat</a>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Arsip Surat >> Tambah',
            'list'  => ['Home', 'Arsip', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambahkan atau edit data arsip. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".'
        ];

        $arsip = Arsip::all();
        $option = Kategori::all();
        $activeMenu = 'arsip';

        return view('arsip.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'arsip' => $arsip, 'activeMenu' => $activeMenu, 'option' => $option]);
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArsipRequest $request)
    {
        try {
            $request->validate([
                'no_surat' => 'required',
                'ktgr_id' => 'required',
                'judul' => 'required',
                'file' => 'required|max:2048',
            ]);

            $file = $request->file('file');
            $fileName = '';
            if ($file) {
                $fileName = $request->no_surat . '_' . date('Ymd') . '.' . $file->getClientOriginalExtension();
            }
            $file->storeAs('public/files', $fileName);

            Arsip::create([
                'no_surat' => $request->no_surat,
                'ktgr_id' => $request->ktgr_id,
                'judul' => $request->judul,
                'file' => $fileName,
                'tanggal_arsip' => now(),
            ]);

            return redirect('/arsip')->with('success', 'Data arsip berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/arsip')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arsip = Arsip::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Arsip',
            'list'  => ['Home', 'Arsip', 'Detail']
        ];

        $page = (object) [
            'title' => 'Arsip Surat >> Lihat'
        ];

        $activeMenu = 'arsip';   // set menu yang sedang aktif

        return view('arsip.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'arsip' => $arsip, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsip $arsip, $id)
    {
        $arsip = Arsip::find($id);
        $option = Kategori::all();

        $breadcrumb = (object) [
            'title' => 'Edit Arsip',
            'list'  => ['Home', 'Arsip', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit arsip'
        ];

        $activeMenu = 'arsip';   // set menu yang sedang aktif

        return view('arsip.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'arsip' => $arsip, 'activeMenu' => $activeMenu, 'option' => $option]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArsipRequest $request, Arsip $arsip, String $id)
    {
        $request->validate([
            'no_surat' => 'required',
            'ktgr_id' => 'required',
            'judul' => 'required',
            'file' => 'required|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = '';
        if ($file) {
            $fileName = $request->no_surat . '_' . date('Ymd') . '.' . $file->getClientOriginalExtension();
        }
        $file->storeAs('public/files', $fileName);

        Arsip::find($id)->update([
            'no_surat' => $request->no_surat,
            'ktgr_id' => $request->ktgr_id,
            'judul' => $request->judul,
            'file' => $fileName,
            'tanggal_arsip' => now(),
        ]);

        return redirect('/arsip')->with('success', 'Data arsip berhasil dirubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = Arsip::find($id);
        if (!$check) {
            return redirect('/arsip')->with('error', 'Data arsip tidak ditemukan');
        }

        try {
            Arsip::destroy($id);

            return redirect('/arsip')->with('success', 'Data arsip berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/arsip')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
