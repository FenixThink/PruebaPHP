<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            return  Category::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nameCategories' => 'required|string',
            ]);
            $category=Category::Create([
                'nameCategories' => $request-> nameCategories,
                ]);
            return response()->json([
                'message'=> $category
            ], 201);
            }catch(\Exeption $th){
                return response()->json([
                    'message'->$th->getMessage()
                ],401);
            }

    }
}
