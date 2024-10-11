<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderProduct;

class ApiOrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 15); // Number of orders per page, default to 15
            $orders = Order::with('orderProducts')->paginate($perPage);

            return response()->json($orders, 200);
        } catch (\Exception $e) {
            Log::error('Failed to retrieve orders: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'message' => 'Error retrieving orders',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'total_price' => 'required|numeric|min:0',
                'products' => 'required|array',
                'products.*.product_id' => 'required|exists:products,id',
                'products.*.quantity' => 'required|integer|min:1',
                'products.*.price' => 'required|numeric|min:0'
            ]);

            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'total_price' => $validated['total_price']
            ]);

            foreach ($validated['products'] as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price']
                ]);
            }

            return response()->json($order, 201);
        } catch (\Exception $e) {
            Log::error('Failed to process order: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json([
                'message' => 'Error processing order',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}

    

