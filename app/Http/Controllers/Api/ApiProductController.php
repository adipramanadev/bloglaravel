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
        $products = Product::with('categories')->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        //validate data from json 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id'=>'required',
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

    public function update(Request $request, $id)
        {
            // Validate incoming request data
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'price' => 'sometimes|required|numeric|min:0',
                'stock' => 'sometimes|required|integer|min:0',
                'description' => 'nullable|string',
            ]);

            // Find the product by ID
            $product = Product::find($id);

            // Check if product exists
            if (!$product) {
                return response()->json([
                    'msg' => false,
                    'data' => 'Product not found'
                ], 404);
            }

            // Update the product with validated data
            $product->update($validated);

            // Return a success response with the updated product data
            return response()->json([
                'msg' => true,
                'data' => $product
            ], 200);
        }
    

    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        //delete Data product 
        $product->delete();
        return response()->json([
            'msg' => true,
            'data' => 'product deleted'
        ]);
    }

}

