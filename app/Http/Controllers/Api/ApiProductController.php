<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ApiProductController extends Controller
{
    //index 
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        //validate data from json 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);


        $products = Product::create($validated);

        if($products){
            return  response()->json([
                'msg'=>true, 
                'data'=>$products
            ],200);
        }else{
            return response()->json([
                'msg'=>false, 
                'data'=>'product not found'
            ],404);
        }
    }
}
