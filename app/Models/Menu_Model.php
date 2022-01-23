<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_menu';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['categoryId', 'menu', 'gambar', 'harga', 'created_at', 'updated_at'];

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category_Model::class, 'categoryId');
    }
}
