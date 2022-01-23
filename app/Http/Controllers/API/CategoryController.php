<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Category_Model;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category_Model::all();

        return response()->json($data);
    }
    
    public function view($id)
    {   
        $data = Category_Model::where('id', $id)->first();

        return response()->json($data);
    }

    public function insert(Request $request)
    {   
        $this->validate($request, [
            'kategori' => 'required|unique:tbl_category',
            'keterangan' => 'required'
        ]);

        $category = Category_Model::create($request->all());

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {   
        Category_Model::where('id', $id)->update($request->all());

        return response()->json("Data Berhasil diupdate");
    }

    public function delete($id)
    {   
        Category_Model::where('id', $id)->delete($id);

        return response()->json("Data Berhasil dihapus");
    }
}
