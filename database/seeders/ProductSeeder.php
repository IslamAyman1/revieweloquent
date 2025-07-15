<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['productName' => 'product 1', 'productStock' => 5],
            ['productName' => 'product 2', 'productStock' => 10],
            ['productName' => 'product 3', 'productStock' => 15],
            ['productName' => 'product 4', 'productStock' => 20],
            ['productName' => 'product 5', 'productStock' => 25],
            ['productName' => 'product 6', 'productStock' => 30],
            ['productName' => 'product 7', 'productStock' => 35],
            ['productName' => 'product 8', 'productStock' => 40],
            ['productName' => 'product 9', 'productStock' => 45],
            ['productName' => 'product 10', 'productStock' => 50],
        ];
        foreach ($products as $product) {
            product::create($product);
        }
    }
}
