<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Menu_Model;

class MenuController extends Controller
{
    public function index()
    {
        $data = Menu_Model::all();

        return response()->json($data);
    }
    
    public function view($id)
    {   
        $data = Menu_Model::where('id', $id)->first();
        
        return response()->json($data);
    }

    public function insert(Request $request)
    {           
        $this->validate($request, [
            'categoryId' => 'required|numeric',
            'menu' => 'required|unique:tbl_menu',
            'gambar' => 'required',
            'harga' => 'required|numeric'
        ]);

        // Mendapatkan nama gambar
        $gambar = $request->file('gambar')->getClientOriginalName();

        // Memindahkan gambar
        $request->file('gambar')->move('Upload', $gambar);

        $data = [
            'categoryId' => $request->input('categoryId'),
            'menu' => $request->input('menu'),
            'gambar' => url('Upload/'.$gambar),
            'harga' => $request->input('harga')     
        ];

        $menu = Menu_Model::create($data);

        if($menu){
            $result = [
                'status' => 200,
                'pesan' => "Data Berhasil ditambahkan",
                'data' => $data
            ];
        }else{
            $result = [
                'status' => 400,
                'pesan' => "Data Gagal ditambahkan",
                'data' => '400'
            ];
        }

        return response()->json($result);
    }

    public function update(Request $request, $id)
    {   
        Menu_Model::where('id', $id)->update($request->all());

        return response()->json("Data Berhasil diupdate");
    }

    public function delete($id)
    {
        Menu_Model::where('id', $id)->delete($id);
        
        return response()->json("Data Berhasil dihapus");
    }
}
