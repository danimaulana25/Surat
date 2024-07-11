<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    
    protected $table = 'arsips';
    protected $primaryKey = 'arsip_id';
    protected $fillable = ['no_surat', 'ktgr_id', 'judul', 'file', 'tanggal_arsip'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'ktgr_id', 'kategori_id');
    }
}
