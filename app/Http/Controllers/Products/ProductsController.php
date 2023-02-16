<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Services\Products\ProductService;
use App\Http\Resources\ProductCollection;
use App\Models\Product;

class ProductsController extends Controller
{
    public function get(Request $request)
    {
        $reqData = $request->all();
        
        $result = ProductService::getProducts($reqData);
        return response()->json(['status' => @$result['status'], 'code' => @$result['code'], 'message' => @$result['message'], 'data' => @$result['data']], @$result['code']);
    }

    public function getByResource(Request $request)
    {
        return new ProductCollection(Product::all());
    }
}
