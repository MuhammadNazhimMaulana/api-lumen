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
        return response()->json("Ini index");
    }
    
    public function view(Category_Model $category)
    {   
        return response()->json("Ini view$category");
    }

    public function insert(Request $request)
    {   
        return response()->json($request);
    }

    public function update(Category_Model $category)
    {   
        return response()->json("Ini update $category");
    }

    public function delete(Category_Model $category)
    {   
        return response()->json("Ini delete $category");
    }
}
