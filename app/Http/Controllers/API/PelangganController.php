<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Pelanggan_Model;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan_Model::all();

        return response()->json($data);
    }
    
    public function view($id)
    {   
        $data = Pelanggan_Model::where('id', $id)->first();
        
        return response()->json($data);
    }

    public function insert(Request $request)
    {           
        $this->validate($request, [
            'pelanggan' => 'required|unique:tbl_pelanggan',
            'alamat' => 'required',
            'no_hp' => 'required|numeric'
        ]);

        $pelanggan = Pelanggan_Model::create($request->all());

        return response()->json($pelanggan);
    }

    public function update(Request $request, $id)
    {   
        Pelanggan_Model::where('id', $id)->update($request->all());

        return response()->json("Data Berhasil diupdate");
    }

    public function delete($id)
    {
        Pelanggan_Model::where('id', $id)->delete($id);
        
        return response()->json("Data Berhasil dihapus");
    }
}
