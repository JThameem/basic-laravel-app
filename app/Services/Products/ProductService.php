<?php

namespace App\Services\Products;

use App\Models\Product;

class ProductService
{
    public static function getProducts($reqData)
    {
        $products = Product::all();
        $result = ['status' => true, 'code' => 200, 'message' => 'Products viewed successfully', 'data' => @$products];
    
        return $result;
    }
}
