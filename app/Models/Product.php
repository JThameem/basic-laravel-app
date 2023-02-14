<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    public static function insertRecord($reqData)
    {
        $product = new Product;
        $product->name = @$reqData['name'];
        $product->code = @$reqData['code'];
        $product->description = @$reqData['description'];
        $product->save();

        return $product;
    }
}
