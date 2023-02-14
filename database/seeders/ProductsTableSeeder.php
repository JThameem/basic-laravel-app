<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product A',
                'code' => 'PRODUCT_A',
                'description' => 'Product created by system'
            ],
            [
                'name' => 'Product B',
                'code' => 'PRODUCT_B',
                'description' => 'Product created by system'
            ],
            [
                'name' => 'Product C',
                'code' => 'PRODUCT_C',
                'description' => 'Product created by system'
            ],
        ];

        foreach ($products as $product)
        {
            Product::insertRecord($product);
        }
    }
}
