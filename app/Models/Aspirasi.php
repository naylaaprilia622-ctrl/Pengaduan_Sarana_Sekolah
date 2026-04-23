<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasis';
    protected $primaryKey = 'id_aspirasi';
    protected $fillable = ['nis', 'id_kategori', 'status', 'feedback', 'diproses_at', 'diselesaikan_at'];
    protected $casts = ['diproses_at' => 'datetime', 'diselesaikan_at' => 'datetime'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function inputAspirasi()
    {
        return $this->hasOne(InputAspirasi::class, 'id_aspirasi', 'id_aspirasi');
    }
}
