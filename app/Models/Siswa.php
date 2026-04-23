<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['nis', 'nama', 'kelas', 'password'];
    protected $hidden = ['password'];

    public function aspirasis()
    {
        return $this->hasMany(Aspirasi::class, 'nis', 'nis');
    }
}
