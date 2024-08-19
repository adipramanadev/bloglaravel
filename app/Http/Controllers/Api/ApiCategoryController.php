<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ApiCategoryController extends Controller
{
    //index 
    public function index()
    {
        //get data 
        $categories = Category::all();
        //redirect json 

        return response()->json([
            'status' => 200,
            'message' => 'categories retrieved successfully',
            'data' => $categories
        ]);
    }

    //post data api 
    public function store(Request $request)
    {
        //validate api 
        $request->validate([
            'namecategory'=>'required'
        ]);

        //create data
        $input = $request->all();
        $category = Category::create($input);
        //redirect json
        if ($category) {
            return response()->json([
                'msg'=>true, 
                'data'=>$category
            ],200);
        }else {
            return response()->json([
                'msg'=>false,
                'data'=>'error ...'
            ],404);
        }

    }

    //delete api 
    public function destroy($id)
    {
        //delete data
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json([
                'msg'=>true,
                'data'=>'category deleted successfully'
                ],200);
                }else {
                    return response()->json([
                        'msg'=>false,
                        'data'=>'category not found'
                        ],404);
                    
                }
    }

    //function update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'namecategory'=>'required'
        ]);
        $category = Category::find($id);
        if ($category) {
            $category->update($request->all());
            return response()->json([
                'msg'=>true,
                'data'=>$category
            ],200);
        } else{
            return response()->json([
                'msg'=>false, 
                'data'=>'category not found'
            ],404);
        }
    }
}
