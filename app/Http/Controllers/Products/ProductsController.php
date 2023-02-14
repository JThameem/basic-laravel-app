<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Services\Products\ProductService;

class ProductsController extends Controller
{
    public function get(Request $request)
    {
        $reqData = $request->all();
        
        $result = ProductService::getProducts($reqData);
        return response()->json(['status' => @$result['status'], 'code' => @$result['code'], 'message' => @$result['message'], 'data' => @$result['data']], @$result['code']);
    }
}
