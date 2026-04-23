<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $fillable = ['ket_kategori'];

    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class, 'id_kategori', 'id_kategori');
    }
}
