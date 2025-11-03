<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table  = 'mhs';
    protected $primaryKey = 'mhs_id';
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'jurusan',
        'alamat',
    ];
}
