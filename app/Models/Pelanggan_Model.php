<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_pelanggan';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['pelanggan', 'alamat', 'no_hp', 'created_at', 'updated_at'];
}
