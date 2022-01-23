<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_category';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['kategori', 'keterangan', 'created_at', 'updated_at'];

    // Inverse
    public function menu()
    {
        return $this->hasOne(Menu_Model::class, 'categoryId');
    }
}
