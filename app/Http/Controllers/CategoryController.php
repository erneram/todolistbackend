<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:50'
        ]);
        Category::create($data);
        return response()->json(['message' => 'Categoria creada correctamente'], 200);
    }

    public function update(Request $request, $categoryId){
        $category = Category::findOrFail($categoryId);
        $data = $request->validate([
            'name ' => 'required|string|max:50'
        ]);
        $category->update($data);
        return response()->json(['message' => 'Actualizado correctamente'], 200);
    }

    public function delete($categoryId){
        Category::findOrFail($categoryId)->delete();
        return response()->json(['message' => 'Eliminado correctamente'], 200);
    }
}
