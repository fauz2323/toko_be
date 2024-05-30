<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getAllProduct() {
        $product = Product::with('category', 'image')->get();

        return response(
            [
                'message'=> 'Success',
                'products' => $product,
            ],
            200,
        );
    }

    function getCategory() {
        $category = CategoryProduct::all();

        return response(
            [
                'message'=> 'Success',
                'categories' => $category,
            ],
            200,
        );
    }

    function getDetailProduct(Request $request) {
        $request->validate([
            'uuid' => 'required',
        ]);

        $product = Product::with('category', 'image')->where('uuid', $request->uuid)->first();

        if (!$product) {
            return response(
                [
                    'message' => 'Product not found',
                ],
                201,
            );
        }

        return response(
            [
                'message'=> 'Success',
                'product' => $product,
            ],
            200,
        );
    }

    function getProductByCategory(Request $request) {
        $request->validate([
            'uuid' => 'required',
        ]);

        $category = CategoryProduct::where('uuid', $request->uuid)->first();

        $product = Product::with('category', 'image')->where('category_id', $category->id)->get();

        return response(
            [
                'message'=> 'Success',
                'products' => $product,
            ],
            200,
        );
    }
}
